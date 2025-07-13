<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vegetable;

class VegetableController extends Controller
{
    // Show all vegetables (admin)
    public function index()
    {
        $vegetables = Vegetable::latest()->get();
        return view('admin.vegetables.index', compact('vegetables'));
    }

    // Show create form
    public function create()
    {
        return view('admin.vegetables.create');
    }

    // Store new vegetable
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_per_kg' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Vegetable::create([
            'name' => $request->name,
            'price_per_kg' => $request->price_per_kg,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Vegetable added successfully!');
    }

    // Show edit form
    public function edit(string $id)
    {
        $vegetable = Vegetable::findOrFail($id);
        return view('admin.vegetables.edit', compact('vegetable'));
    }

    // Update vegetable
    public function update(Request $request, string $id)
    {
        $vegetable = Vegetable::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price_per_kg' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'description' => 'required',
        ]);

        $data = $request->only(['name', 'price_per_kg', 'stock', 'description']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $data['image'] = $imageName;
        }

        $vegetable->update($data);

        return redirect()->route('vegetables.index')->with('success', 'Vegetable updated!');
    }

    // Delete vegetable
    public function destroy(string $id)
    {
        $vegetable = Vegetable::findOrFail($id);

        $imagePath = public_path('uploads/' . $vegetable->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $vegetable->delete();

        return redirect()->route('vegetables.index')->with('success', 'Vegetable deleted!');
    }
}
