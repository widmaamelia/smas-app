<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_code' => 'required|unique:items',
            'item_name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'brand' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        Item::create($data);

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_name'   => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'required|integer|min:0',
            'brand'       => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'item_code'   => [
                'required',
                Rule::unique('items')->ignore($item->id),
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        $data = $request->only([
            'item_name', 
            'category_id', 
            'item_code', 
            'stock', 
            'brand', 
            'description'
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            $data['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($data);

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil diperbarui!');
    }
    public function destroy(Item $item)
{
    $item->delete(); // soft delete

    return redirect()->route('items.index')
        ->with('success', 'Barang berhasil dihapus (soft delete)');
}
}