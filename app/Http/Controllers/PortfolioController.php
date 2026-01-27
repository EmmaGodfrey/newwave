<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use App\Models\PortfolioEvent;
use App\Models\EventImage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::where('is_active', true)
            ->with(['activeEvents' => function($query) {
                $query->with('featuredImage');
            }])
            ->orderBy('sort_order')
            ->get();

        $testimonials = Testimonial::active()->ordered()->take(2)->get();

        return view('frontend.pages.portfolio', compact('categories', 'testimonials'));
    }

    public function show($slug)
    {
        $event = PortfolioEvent::where('slug', $slug)
            ->where('is_active', true)
            ->with(['category', 'images'])
            ->firstOrFail();

        return view('frontend.pages.portfolio-event', compact('event'));
    }

    public function category($slug)
    {
        $category = PortfolioCategory::where('slug', $slug)
            ->where('is_active', true)
            ->with(['activeEvents' => function($query) {
                $query->with('featuredImage');
            }])
            ->firstOrFail();

        return view('frontend.pages.portfolio-category', compact('category'));
    }
}
