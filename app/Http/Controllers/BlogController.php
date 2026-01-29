<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blogs.
     */
    public function index()
    {
        $blogs = Blog::with('category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        // Get recent posts for sidebar
        $recentPosts = Blog::with('category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Get active categories for sidebar
        $categories = BlogCategory::active()
            ->whereHas('activeBlogs')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Get archives (months with published posts)
        $archives = Blog::published()
            ->selectRaw('DATE_FORMAT(published_at, "%Y-%m") as month, DATE_FORMAT(published_at, "%M %Y") as formatted_month, COUNT(*) as count')
            ->groupBy('month', 'formatted_month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        $testimonials = Testimonial::active()->ordered()->take(2)->get();

        return view('frontend.pages.blog', compact('blogs', 'recentPosts', 'categories', 'archives', 'testimonials'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Get previous and next posts
        $previousPost = Blog::published()
            ->where('published_at', '<', $blog->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $nextPost = Blog::published()
            ->where('published_at', '>', $blog->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        // Get recent posts for sidebar
        $recentPosts = Blog::with('category')
            ->published()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $testimonials = Testimonial::active()->ordered()->take(2)->get();

        return view('frontend.pages.blog-detail', compact('blog', 'previousPost', 'nextPost', 'recentPosts', 'testimonials'));
    }

    /**
     * Display blogs by category.
     */
    public function category($categorySlug)
    {
        $selectedCategory = BlogCategory::where('slug', $categorySlug)
            ->active()
            ->firstOrFail();

        $blogs = Blog::with('category')
            ->published()
            ->where('blog_category_id', $selectedCategory->id)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        // Get recent posts for sidebar
        $recentPosts = Blog::with('category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Get active categories for sidebar
        $categories = BlogCategory::active()
            ->whereHas('activeBlogs')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Get archives
        $archives = Blog::published()
            ->selectRaw('DATE_FORMAT(published_at, "%Y-%m") as month, DATE_FORMAT(published_at, "%M %Y") as formatted_month, COUNT(*) as count')
            ->groupBy('month', 'formatted_month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        return view('frontend.pages.blog', compact('blogs', 'recentPosts', 'categories', 'archives', 'selectedCategory'));
    }

    /**
     * Search blogs.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $blogs = Blog::with('category')
            ->published()
            ->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%')
                    ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        // Get recent posts for sidebar
        $recentPosts = Blog::with('category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Get active categories for sidebar
        $categories = BlogCategory::active()
            ->whereHas('activeBlogs')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Get archives
        $archives = Blog::published()
            ->selectRaw('DATE_FORMAT(published_at, "%Y-%m") as month, DATE_FORMAT(published_at, "%M %Y") as formatted_month, COUNT(*) as count')
            ->groupBy('month', 'formatted_month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        return view('frontend.pages.blog', compact('blogs', 'recentPosts', 'categories', 'archives', 'searchTerm'));
    }
}
