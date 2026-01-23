<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blogs.
     */
    public function index()
    {
        $blogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        // Get recent posts for sidebar
        $recentPosts = Blog::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Get unique categories for sidebar
        $categories = Blog::published()
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

        // Get archives (months with published posts)
        $archives = Blog::published()
            ->selectRaw('DATE_FORMAT(published_at, "%Y-%m") as month, DATE_FORMAT(published_at, "%M %Y") as formatted_month, COUNT(*) as count')
            ->groupBy('month', 'formatted_month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        return view('frontend.pages.blog', compact('blogs', 'recentPosts', 'categories', 'archives'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
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
        $recentPosts = Blog::published()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.pages.blog-detail', compact('blog', 'previousPost', 'nextPost', 'recentPosts'));
    }

    /**
     * Display blogs by category.
     */
    public function category($category)
    {
        $blogs = Blog::published()
            ->where('category', $category)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        // Get recent posts for sidebar
        $recentPosts = Blog::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Get unique categories for sidebar
        $categories = Blog::published()
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

        // Get archives
        $archives = Blog::published()
            ->selectRaw('DATE_FORMAT(published_at, "%Y-%m") as month, DATE_FORMAT(published_at, "%M %Y") as formatted_month, COUNT(*) as count')
            ->groupBy('month', 'formatted_month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        return view('frontend.pages.blog', compact('blogs', 'recentPosts', 'categories', 'archives', 'category'));
    }

    /**
     * Search blogs.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $blogs = Blog::published()
            ->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%')
                    ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        // Get recent posts for sidebar
        $recentPosts = Blog::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Get unique categories for sidebar
        $categories = Blog::published()
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

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
