<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\PortfolioEvent;
use App\Models\PortfolioCategory;
use App\Support\Seo;

class SeoController extends Controller
{
    public function sitemap()
    {
        $urls = [];
        foreach (['home', 'about', 'services', 'portfolio', 'contact', 'privacy', 'terms', 'cookies', 'refunds'] as $name) {
            $urls[] = ['loc' => Seo::url(route($name, [], false))];
        }
        if (Blog::published()->exists()) $urls[] = ['loc' => Seo::url('blog')];
        foreach (Blog::published()->get() as $blog) {
            $urls[] = ['loc' => Seo::url(route('blog.show', $blog->slug, false)), 'lastmod' => $blog->updated_at->toAtomString()];
        }
        foreach (PortfolioEvent::where('is_active', true)->get() as $event) {
            $urls[] = ['loc' => Seo::url(route('portfolio.event', $event->slug, false)), 'lastmod' => $event->updated_at->toAtomString()];
        }
        foreach (PortfolioCategory::where('is_active', true)->whereHas('activeEvents')->get() as $category) {
            $urls[] = ['loc' => Seo::url(route('portfolio.category', $category->slug, false))];
        }
        foreach (BlogCategory::active()->whereHas('blogs', fn ($query) => $query->published())->get() as $category) {
            $urls[] = ['loc' => Seo::url(route('blog.category', $category->slug, false))];
        }
        return response()->view('sitemap', compact('urls'))->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
