<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\DataTables\PortfolioCategoryDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    public function index(PortfolioCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio.categories.index');
    }

    public function create()
    {
        return view('admin.portfolio.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');

        PortfolioCategory::create($data);

        return redirect()->route('admin.portfolio.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(PortfolioCategory $category)
    {
        $category->load('events');
        return view('admin.portfolio.categories.show', compact('category'));
    }

    public function edit(PortfolioCategory $category)
    {
        return view('admin.portfolio.categories.edit', compact('category'));
    }

    public function update(Request $request, PortfolioCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');

        $category->update($data);

        return redirect()->route('admin.portfolio.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(PortfolioCategory $category)
    {
        $category->delete();
        
        return redirect()->route('admin.portfolio.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
