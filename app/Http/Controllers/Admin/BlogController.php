<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog/images', 'public');
        }

        // Set published_at if status is published and not provided
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blog/images', 'public');
        }

        // Set published_at if status is published and not already set
        if ($validated['status'] === 'published' && empty($validated['published_at']) && empty($blog->published_at)) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return response()->json(['success' => true, 'message' => 'Blog deleted successfully.']);
    }
}
