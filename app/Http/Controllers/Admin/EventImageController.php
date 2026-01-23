<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventImage;
use App\Models\PortfolioEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventImageController extends Controller
{
    public function index()
    {
        $images = EventImage::with('event.category')->orderBy('created_at', 'desc')->get();
        return view('admin.portfolio.images.index', compact('images'));
    }

    public function create()
    {
        $events = PortfolioEvent::where('is_active', true)
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.portfolio.images.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:portfolio_events,id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'default_title' => 'nullable|string|max:255',
        ]);

        $eventId = $request->event_id;
        $images = $request->file('images');
        $defaultTitle = $request->input('default_title');

        foreach ($images as $index => $image) {
            if ($image) {
                $imagePath = $image->store('portfolio/images', 'public');
                
                EventImage::create([
                    'event_id' => $eventId,
                    'image_path' => $imagePath,
                    'title' => $defaultTitle,
                    'description' => null,
                    'sort_order' => $index,
                    'is_featured' => false
                ]);
            }
        }

        // If this was uploaded from event edit page, redirect back to event edit
        if ($request->input('from_event_edit')) {
            return redirect()->route('admin.portfolio.events.edit', $eventId)
                ->with('success', 'Images uploaded successfully.');
        }

        // If this was uploaded from event show page, redirect back to event show
        if ($request->input('from_event_show')) {
            return redirect()->route('admin.portfolio.events.show', $eventId)
                ->with('success', 'Images uploaded successfully.');
        }

        return redirect()->route('admin.portfolio.images.index')
            ->with('success', 'Images uploaded successfully.');
    }

    public function show(EventImage $image)
    {
        $image->load('event.category');
        return view('admin.portfolio.images.show', compact('image'));
    }

    public function edit(EventImage $image)
    {
        $events = PortfolioEvent::where('is_active', true)
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.portfolio.images.edit', compact('image', 'events'));
    }

    public function update(Request $request, EventImage $image)
    {
        $request->validate([
            'event_id' => 'required|exists:portfolio_events,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($image->image_path);
            
            $data['image_path'] = $request->file('image')
                ->store('portfolio/images', 'public');
        }

        $image->update($data);

        return redirect()->route('admin.portfolio.images.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(EventImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
        
        // Check if this is an AJAX request
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully.'
            ]);
        }
        
        return redirect()->route('admin.portfolio.images.index')
            ->with('success', 'Image deleted successfully.');
    }
}
