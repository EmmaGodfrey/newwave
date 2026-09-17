<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\PortfolioEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PrivacySeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_content_preserves_formatting_without_trackers_or_active_html(): void
    {
        $safe = \App\Support\PublicContent::render('<p onclick="bad()">Hello <strong>world</strong></p><iframe src="https://tracker.test"></iframe><img src="https://tracker.test/pixel"><script>bad()</script><a href="javascript:bad()">Link</a>');
        $this->assertStringContainsString('<strong>world</strong>', $safe);
        foreach (['onclick', 'tracker.test', '<script', 'javascript:'] as $value) $this->assertStringNotContainsString($value, $safe);
    }

    public function test_contact_requires_consent_and_records_it_without_requiring_phone(): void
    {
        Mail::fake();
        $payload = ['name' => 'Visitor', 'email' => 'visitor@example.test', 'subject' => 'Coverage', 'message' => 'Please contact me.'];
        $this->postJson('/contact', $payload)->assertUnprocessable()->assertJsonValidationErrors('privacy_consent');
        $this->assertDatabaseCount('contact_messages', 0);
        $this->postJson('/contact', $payload + ['privacy_consent' => '1', 'privacy_policy_version' => 'forged'])->assertOk();
        $message = ContactMessage::firstOrFail();
        $this->assertNotNull($message->consented_at);
        $this->assertSame(config('site.policy_version'), $message->privacy_policy_version);
        $this->assertSame('', $message->phone);
    }

    public function test_public_notices_and_form_do_not_load_external_embeds_or_fonts(): void
    {
        foreach (['privacy-policy', 'terms-and-conditions', 'cookie-policy', 'refund-policy'] as $path) {
            $this->get('/'.$path)->assertOk()->assertSee('Zambia');
        }
        $this->get('/contact')->assertOk()->assertSee('privacy_consent')->assertSee('Phone (optional)')
            ->assertDontSee('<iframe', false)->assertDontSee('fonts.googleapis.com');
        $this->get('/login')->assertSee('noindex, nofollow');
    }

    public function test_seo_has_page_specific_metadata_and_keeps_paginated_canonicals(): void
    {
        $this->get('/contact?utm_source=test')->assertSee('<title>Contact NewWave | NewWave Motorsport</title>', false)
            ->assertSee('<link rel="canonical" href="https://newwavemotorsport.com/contact">', false)
            ->assertSee('application/ld+json');
        $this->get('/blog?page=2')->assertSee('https://newwavemotorsport.com/blog?page=2', false);
        $this->get('/blog/search?search=track')->assertSee('noindex, follow');
    }

    public function test_sitemap_and_article_metadata_only_expose_published_content(): void
    {
        Blog::create(['title' => 'Track report', 'slug' => 'track-report', 'content' => 'A day at the track.', 'status' => 'published', 'published_at' => now()->subDay()]);
        Blog::create(['title' => 'Secret draft', 'slug' => 'secret-draft', 'content' => 'Draft', 'status' => 'draft']);
        Blog::create(['title' => 'Future post', 'slug' => 'future-post', 'content' => 'Future', 'status' => 'published', 'published_at' => now()->addDay()]);
        $category = \App\Models\PortfolioCategory::create(['name' => 'Track', 'slug' => 'track', 'is_active' => true]);
        PortfolioEvent::create(['category_id' => $category->id, 'title' => 'Hidden gallery', 'slug' => 'hidden-gallery', 'is_active' => false]);
        $response = $this->get('/sitemap.xml')->assertOk()->assertSee('/blog/track-report')
            ->assertDontSee('secret-draft')->assertDontSee('future-post')->assertDontSee('hidden-gallery')->assertDontSee('/login');
        $this->assertNotFalse(simplexml_load_string($response->getContent()));
        $this->get('/blog/track-report')->assertSee('<title>Track report | NewWave Motorsport</title>', false)->assertSee('BlogPosting');
    }
}
