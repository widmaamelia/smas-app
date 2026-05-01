<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

   
    public function create(): View
    {
        return view('categories.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->only('name'));

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    
    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->only('name'));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete(); // Soft delete

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}