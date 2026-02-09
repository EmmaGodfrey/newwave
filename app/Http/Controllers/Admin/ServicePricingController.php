<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServicePricingDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServicePricing;
use Illuminate\Http\Request;

class ServicePricingController extends Controller
{
    public function index(ServicePricingDataTable $dataTable)
    {
        return $dataTable->render('admin.service-pricing.index');
    }

    public function create()
    {
        return view('admin.service-pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_pricing,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'price_label' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->input('is_active', 0) == 1;
        $validated['is_featured'] = $request->input('is_featured', 0) == 1;
        $validated['order'] = $validated['order'] ?? 0;
        $validated['price_label'] = $validated['price_label'] ?? 'Starting at';

        ServicePricing::create($validated);

        return redirect()->route('admin.service-pricing.index')->with('success', 'Service pricing created successfully.');
    }

    public function edit(ServicePricing $servicePricing)
    {
        return view('admin.service-pricing.edit', compact('servicePricing'));
    }

    public function update(Request $request, ServicePricing $servicePricing)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_pricing,slug,' . $servicePricing->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'price_label' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->input('is_active', 0) == 1;
        $validated['is_featured'] = $request->input('is_featured', 0) == 1;
        $validated['order'] = $validated['order'] ?? $servicePricing->order;

        $servicePricing->update($validated);

        return redirect()->route('admin.service-pricing.index')->with('success', 'Service pricing updated successfully.');
    }

    public function destroy(ServicePricing $servicePricing)
    {
        $servicePricing->delete();

        return response()->json(['success' => true, 'message' => 'Service pricing deleted successfully.']);
    }
}
