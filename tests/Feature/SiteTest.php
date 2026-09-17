<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactMessage;
use App\Models\EventImage;
use App\Models\PortfolioCategory;
use App\Models\PortfolioEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->is_admin = true;
        $user->save();
        return $user;
    }

    public function test_public_pages_render_without_seed_data(): void
    {
        foreach (['/', '/about', '/services', '/portfolio', '/blog', '/blog/search?search=track', '/contact', '/pricing', '/team', '/faq', '/testimonials', '/login'] as $url) {
            $this->get($url)->assertOk();
        }
        $this->get('/missing-page')->assertNotFound()->assertSee('Back to');
    }

    public function test_registration_is_closed_and_admin_requires_explicit_access(): void
    {
        $this->get('/register')->assertNotFound();
        $this->post('/register', [])->assertNotFound();
        $this->get('/admin')->assertRedirect('/login');
        $this->actingAs(User::factory()->create())->get('/admin')->assertForbidden();
        $this->actingAs($this->admin())->get('/admin')->assertOk();
    }

    public function test_login_only_accepts_staff_and_redirects_to_dashboard(): void
    {
        $user = User::factory()->create(['password' => Hash::make('test-password')]);
        $this->post('/login', ['email' => $user->email, 'password' => 'test-password'])->assertSessionHasErrors('email');
        $this->assertGuest();
        $user->is_admin = true;
        $user->save();
        $this->post('/login', ['email' => $user->email, 'password' => 'test-password'])->assertRedirect('/admin');
        $this->assertAuthenticatedAs($user);
    }

    public function test_auth_screens_share_branding_and_password_reset_still_works(): void
    {
        foreach (['/login', '/password/reset', '/password/reset/test-token?email=staff@example.test'] as $url) {
            $this->get($url)->assertOk()->assertSee('newwavelogo.png')->assertSee('EGlabs')
                ->assertDontSee('Minible')->assertDontSee('EGCodes');
        }
        $user = $this->admin();
        $token = \Illuminate\Support\Facades\Password::broker()->createToken($user);
        $this->post('/password/reset', ['email' => $user->email, 'token' => $token,
            'password' => 'new-test-password', 'password_confirmation' => 'new-test-password'])
            ->assertRedirect('/admin');
        $this->assertTrue(Hash::check('new-test-password', $user->fresh()->password));
    }

    public function test_admin_grant_targets_only_the_selected_account(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        $this->artisan('admin:grant', ['email' => $user->email])->assertSuccessful();
        $this->assertTrue($user->fresh()->is_admin);
        $this->assertFalse($other->fresh()->is_admin);
        $this->artisan('admin:grant', ['email' => 'missing@example.test'])->assertFailed();
    }

    public function test_admin_creation_uses_a_private_password_prompt(): void
    {
        $this->artisan('admin:create', ['email' => 'staff@example.test', '--name' => 'Staff'])
            ->expectsQuestion('Password (at least 12 characters)', 'a-long-test-password')
            ->expectsQuestion('Confirm password', 'a-long-test-password')
            ->assertSuccessful();
        $user = User::where('email', 'staff@example.test')->firstOrFail();
        $this->assertTrue($user->is_admin);
        $this->assertTrue(Hash::check('a-long-test-password', $user->password));
    }

    public function test_staff_can_manage_access_for_another_user(): void
    {
        $this->actingAs($this->admin());
        $this->postJson('/admin/users', ['name' => 'Staff', 'email' => 'staff@example.test', 'password' => 'test-password', 'password_confirmation' => 'test-password', 'is_admin' => true])->assertOk();
        $user = User::where('email', 'staff@example.test')->firstOrFail();
        $this->assertTrue($user->is_admin);
        $this->putJson('/admin/users/'.$user->id, ['name' => $user->name, 'email' => $user->email, 'is_admin' => false])->assertOk();
        $this->assertFalse($user->fresh()->is_admin);
    }

    public function test_credential_rotation_updates_only_the_selected_account(): void
    {
        $user = User::factory()->create(['email' => 'old-admin@example.test', 'remember_token' => 'old-token']);
        $other = User::factory()->create();
        $otherPassword = $other->password;
        $this->artisan('admin:credentials', ['email' => $user->email, '--new-email' => 'new-admin@example.test'])
            ->expectsQuestion('New password (at least 12 characters)', 'rotated-test-password')
            ->expectsQuestion('Confirm new password', 'rotated-test-password')
            ->assertSuccessful();
        $user->refresh();
        $this->assertSame('new-admin@example.test', $user->email);
        $this->assertTrue($user->is_admin);
        $this->assertTrue(Hash::check('rotated-test-password', $user->password));
        $this->assertNotSame('old-token', $user->remember_token);
        $this->assertSame($otherPassword, $other->fresh()->password);
        $this->assertFalse($other->fresh()->is_admin);
    }

    public function test_credential_rotation_rejects_another_accounts_email(): void
    {
        $user = $this->admin();
        $other = User::factory()->create();
        $this->artisan('admin:credentials', ['email' => $user->email, '--new-email' => $other->email])->assertFailed();
        $this->assertSame($user->password, $user->fresh()->password);
    }

    public function test_staff_password_update_revokes_remember_token_and_email_verification(): void
    {
        $admin = $this->admin();
        $user = User::factory()->create(['remember_token' => 'old-token', 'email_verified_at' => now()]);
        $this->actingAs($admin)->putJson('/admin/users/'.$user->id, [
            'name' => $user->name, 'email' => 'changed@example.test', 'is_admin' => false,
            'password' => 'a-long-new-password', 'password_confirmation' => 'a-long-new-password',
        ])->assertOk();
        $this->assertNotSame('old-token', $user->fresh()->remember_token);
        $this->assertNull($user->fresh()->email_verified_at);
        $this->assertTrue(Hash::check('a-long-new-password', $user->fresh()->password));
    }

    public function test_contact_only_stores_validated_fields_and_is_throttled(): void
    {
        Mail::fake();
        $payload = ['name' => 'Visitor', 'email' => 'visitor@example.test', 'phone' => '+260123456789', 'subject' => 'Event enquiry', 'message' => 'Please send details.', 'is_read' => true, 'privacy_consent' => '1'];
        for ($i = 0; $i < 5; $i++) {
            $this->postJson('/contact', $payload)->assertOk();
        }
        $this->assertFalse(ContactMessage::first()->is_read);
        $this->postJson('/contact', $payload)->assertStatus(429);
        $this->assertDatabaseCount('contact_messages', 5);
    }

    public function test_blog_search_category_archive_and_pagination(): void
    {
        $category = BlogCategory::create(['name' => 'Events', 'slug' => 'events', 'is_active' => true]);
        for ($i = 0; $i < 12; $i++) {
            Blog::create(['title' => 'Track '.$i, 'slug' => 'track-'.$i, 'content' => 'Track report', 'status' => 'published', 'published_at' => '2025-01-15', 'blog_category_id' => $category->id]);
        }
        Blog::create(['title' => 'Other month', 'slug' => 'other', 'content' => 'Other', 'status' => 'published', 'published_at' => '2025-02-15']);
        $this->get('/blog/search?search=Track')->assertOk()->assertViewHas('blogs', fn ($blogs) => $blogs->total() === 12 && str_contains($blogs->nextPageUrl(), 'search=Track'));
        $this->get('/blog/category/events')->assertOk()->assertViewHas('testimonials');
        $this->get('/blog?month=2025-01')->assertOk()->assertViewHas('blogs', fn ($blogs) => $blogs->total() === 12);
        $this->getJson('/blog?month=invalid')->assertUnprocessable();
        $this->get('/blog/track-0')->assertOk();
    }

    public function test_portfolio_category_and_image_management_work(): void
    {
        Storage::fake('public');
        $category = PortfolioCategory::create(['name' => 'Track', 'slug' => 'track', 'is_active' => true]);
        $event = PortfolioEvent::create(['title' => 'Track day', 'slug' => 'track-day', 'category_id' => $category->id, 'is_active' => true]);
        $this->get('/portfolio/category/track')->assertOk()->assertSee('Track day');
        $this->get('/portfolio/event/track-day')->assertOk();
        $this->actingAs($this->admin());
        $this->get('/admin/portfolio/images')->assertOk();
        $this->get('/admin/portfolio/images/create')->assertOk();
        $this->post('/admin/portfolio/images', ['event_id' => $event->id, 'images' => [UploadedFile::fake()->image('track.jpg')]])->assertRedirect();
        $image = EventImage::firstOrFail();
        Storage::disk('public')->assertExists($image->image_path);
        $this->get('/admin/portfolio/images/'.$image->id.'/edit')->assertOk();
        $this->put('/admin/portfolio/images/'.$image->id, ['event_id' => $event->id, 'title' => 'Trackside', 'sort_order' => 1, 'is_featured' => true, 'image_path' => 'tampered.jpg'])->assertRedirect();
        $this->assertSame($image->image_path, $image->fresh()->image_path);
        $this->assertSame('Trackside', $image->fresh()->title);
        $this->deleteJson('/admin/portfolio/images/'.$image->id)->assertOk();
        Storage::disk('public')->assertMissing($image->image_path);
    }

    public function test_admin_cannot_remove_own_access_or_delete_self(): void
    {
        $user = $this->admin();
        $this->actingAs($user)->putJson('/admin/users/'.$user->id, ['name' => $user->name, 'email' => $user->email, 'is_admin' => false])->assertUnprocessable();
        $this->deleteJson('/admin/users/'.$user->id)->assertUnprocessable();
        $this->assertTrue($user->fresh()->is_admin);
    }

    public function test_routes_have_real_controller_methods(): void
    {
        foreach (Route::getRoutes() as $route) {
            $action = $route->getActionName();
            if (str_starts_with($action, 'App\\') && str_contains($action, '@')) {
                [$class, $method] = explode('@', $action);
                $this->assertTrue(method_exists($class, $method), $action);
            }
        }
    }

    public function test_admin_listing_and_creation_screens_render(): void
    {
        $this->actingAs($this->admin());
        foreach (['users', 'blog-categories', 'blogs', 'team-members', 'testimonials', 'service-pricing', 'faqs', 'portfolio/categories', 'portfolio/events', 'portfolio/images'] as $resource) {
            $this->get('/admin/'.$resource)->assertOk();
            $this->get('/admin/'.$resource.'/create')->assertOk();
        }
        $this->get('/admin/contact/settings')->assertOk();
        $this->get('/admin/contact/messages')->assertOk();
    }

    public function test_navigation_is_focused_and_demo_links_are_removed(): void
    {
        $this->get('/')->assertOk()->assertSee('Admin login')->assertDontSee('duruthemes.com')->assertDontSee('XXX')->assertDontSee('dropdown-item');
        $this->get('/contact')->assertDontSee('1616%20Broadway');
        $this->get('/about')->assertDontSee('95%')->assertDontSee('No team members available');
    }
}
