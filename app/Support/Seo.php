<?php

namespace App\Support;

use Illuminate\Support\Str;

class Seo
{
    public static function url(string $path = ''): string
    {
        return rtrim(config('site.url'), '/').'/'.ltrim($path, '/');
    }

    public static function forPage(array $data): array
    {
        $route = request()->route()?->getName();
        $pages = [
            'home' => ['Motorsport Photography & Videography in Zambia', 'NewWave Motorsport captures motorsport events, automotive culture and trackside action in Zambia. Explore our work and enquire about photography or video coverage.'],
            'about' => ['About NewWave', 'Meet NewWave Motorsport, a Zambia-based photography and videography brand focused on motorsport events, vehicles and car culture.'],
            'services' => ['Photography & Videography Services', 'Explore NewWave Motorsport photography and video services in Zambia. Contact us to discuss your event, vehicle or brand project.'],
            'portfolio' => ['Motorsport Photography Portfolio', 'Browse NewWave Motorsport event galleries, automotive photography and motorsport coverage from Zambia.'],
            'contact' => ['Contact NewWave', 'Contact NewWave Motorsport in Zambia to discuss photography, videography and event coverage. Send an enquiry; bookings are arranged directly.'],
            'blog' => ['Motorsport Stories', 'Read motorsport stories, event coverage and photography updates from NewWave Motorsport.'],
            'blog.search' => ['Search Motorsport Stories', 'Search stories and event coverage from NewWave Motorsport.'],
            'team' => ['Our Team', 'Meet the team behind NewWave Motorsport photography and videography.'],
            'pricing' => ['Request a Photography Quote', 'Discuss your event and request a tailored quote from NewWave Motorsport.'],
            'faq' => ['Frequently Asked Questions', 'Answers to questions about NewWave Motorsport photography, video and event coverage.'],
            'testimonials' => ['Client Feedback', 'Client feedback about NewWave Motorsport.'],
        ];
        [$title, $description] = $pages[$route] ?? [$data['policyTitle'] ?? 'NewWave Motorsport', 'Information from NewWave Motorsport, Zambia.'];
        $image = self::url('assets/frontend/images/newwavelogo.png');
        $type = 'website';
        $article = null;
        if ($route === 'blog.show' && isset($data['blog'])) {
            $article = $data['blog'];
            $title = $article->title;
            $description = $article->excerpt ?: $article->content;
            if ($article->image) $image = self::url('storage/'.$article->image);
            $type = 'article';
        } elseif ($route === 'portfolio.event' && isset($data['event'])) {
            $event = $data['event'];
            $title = $event->title.' — Event Gallery';
            $description = $event->description ?: 'View photography from '.$event->title.' by NewWave Motorsport.';
            $path = $event->featured_image ?: $event->images->first()?->image_path;
            if ($path) $image = self::url('storage/'.$path);
        } elseif (isset($data['selectedCategory']) || ($route === 'portfolio.category' && isset($data['category']))) {
            $category = $data['selectedCategory'] ?? $data['category'];
            $title = $category->name.' — '.($route === 'portfolio.category' ? 'Portfolio' : 'Stories');
            $description = $category->description ?: 'Explore '.$category->name.' from NewWave Motorsport.';
        }
        $page = max(1, (int) request()->query('page', 1));
        $canonical = self::url(request()->path() === '/' ? '' : request()->path());
        if ($page > 1 && in_array($route, ['blog', 'blog.category', 'blog.search'])) {
            $canonical .= '?page='.$page;
            $title .= ' — Page '.$page;
        }
        $description = Str::limit(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($description), ENT_QUOTES, 'UTF-8')), 160);
        $title .= ' | NewWave Motorsport';
        $noindex = $route === 'blog.search' || request()->filled('month') || $route === 'testimonials';
        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                ['@type' => 'Organization', '@id' => self::url().'#organization', 'name' => config('site.business_name'), 'url' => self::url(), 'logo' => self::url('assets/frontend/images/newwavelogo.png')],
                ['@type' => 'WebSite', '@id' => self::url().'#website', 'name' => 'NewWave Motorsport', 'url' => self::url(), 'publisher' => ['@id' => self::url().'#organization']],
            ],
        ];
        if ($article) {
            $schema['@graph'][] = ['@type' => 'BlogPosting', 'headline' => $article->title, 'description' => $description, 'image' => $image, 'mainEntityOfPage' => $canonical, 'datePublished' => $article->published_at->toAtomString(), 'dateModified' => $article->updated_at->toAtomString(), 'publisher' => ['@id' => self::url().'#organization']];
        }
        return compact('title', 'description', 'canonical', 'image', 'type', 'noindex', 'schema');
    }
}
