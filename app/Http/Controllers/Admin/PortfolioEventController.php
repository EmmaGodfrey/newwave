<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioEvent;
use App\Models\PortfolioCategory;
use App\DataTables\PortfolioEventDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioEventController extends Controller
{
    public function index(PortfolioEventDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio.events.index');
    }

    public function create()
    {
        $categories = PortfolioCategory::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.portfolio.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:portfolio_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_images' => 'nullable|array',
            'event_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')
                ->store('portfolio/events', 'public');
        }

        $event = PortfolioEvent::create($data);

        // Handle event images upload
        if ($request->hasFile('event_images')) {
            foreach ($request->file('event_images') as $index => $image) {
                $imagePath = $image->store('portfolio/images', 'public');
                
                $event->images()->create([
                    'image_path' => $imagePath,
                    'sort_order' => $index,
                    'is_featured' => false
                ]);
            }
        }

        return redirect()->route('admin.portfolio.events.index')
            ->with('success', 'Event created successfully with ' . ($request->hasFile('event_images') ? count($request->file('event_images')) : 0) . ' images.');
    }

    public function show(PortfolioEvent $event)
    {
        $event->load(['category', 'images']);
        return view('admin.portfolio.events.show', compact('event'));
    }

    public function edit(PortfolioEvent $event)
    {
        $categories = PortfolioCategory::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.portfolio.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, PortfolioEvent $event)
    {
        $request->validate([
            'category_id' => 'required|exists:portfolio_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_images' => 'nullable|array',
            'event_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($event->featured_image) {
                Storage::disk('public')->delete($event->featured_image);
            }
            
            $data['featured_image'] = $request->file('featured_image')
                ->store('portfolio/events', 'public');
        }

        $event->update($data);

        // Handle event images upload
        $uploadedCount = 0;
        if ($request->hasFile('event_images')) {
            $maxSortOrder = $event->images()->max('sort_order') ?? -1;
            
            foreach ($request->file('event_images') as $index => $image) {
                $imagePath = $image->store('portfolio/images', 'public');
                
                $event->images()->create([
                    'image_path' => $imagePath,
                    'sort_order' => $maxSortOrder + $index + 1,
                    'is_featured' => false
                ]);
                $uploadedCount++;
            }
        }

        $message = 'Event updated successfully';
        if ($uploadedCount > 0) {
            $message .= ' with ' . $uploadedCount . ' new image(s) added.';
        } else {
            $message .= '.';
        }

        return redirect()->route('admin.portfolio.events.index')
            ->with('success', $message);
    }

    public function destroy(PortfolioEvent $event)
    {
        // Delete featured image
        if ($event->featured_image) {
            Storage::disk('public')->delete($event->featured_image);
        }
        
        // Delete all event images
        foreach ($event->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        
        $event->delete();
        
        return redirect()->route('admin.portfolio.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
