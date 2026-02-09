<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(TestimonialDataTable $dataTable)
    {
        return $dataTable->render('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'company' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:1|max:5',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->input('is_active', 0) == 1;
        $validated['order'] = $validated['order'] ?? 0;
        $validated['rating'] = $validated['rating'] ?? 5;

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'company' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:1|max:5',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->input('is_active', 0) == 1;
        $validated['order'] = $validated['order'] ?? $testimonial->order;
        $validated['rating'] = $validated['rating'] ?? $testimonial->rating;

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
