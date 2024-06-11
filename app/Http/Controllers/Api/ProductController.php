<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOlahan;
use App\Models\ProductNonOlahan;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $productOlahans = ProductOlahan::all();
        $productNonOlahans = ProductNonOlahan::all();
        return response()->json([
            'olahan' => $productOlahans,
            'non_olahan' => $productNonOlahans
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->type == 'non_olahan') {
            $request->validate([
                'stock' => 'required|integer',
                'weight' => 'required|numeric',
            ]);
        }

        $imagePath = $request->file('image')->store('images', 'public');

        if ($request->type == 'olahan') {
            $product = ProductOlahan::create([
                'image' => $imagePath,
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'description' => $request->description,
            ]);
        } else {
            $product = ProductNonOlahan::create([
                'image' => $imagePath,
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'stock' => $request->stock,
                'weight' => $request->weight,
                'description' => $request->description,
            ]);
        }

        return response()->json($product, 201);
    }

    public function show($type, $id)
    {
        if ($type == 'olahan') {
            $product = ProductOlahan::findOrFail($id);
        } else {
            $product = ProductNonOlahan::findOrFail($id);
        }
        
        return response()->json($product);
    }

    public function update(Request $request, $id, $type)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($type == 'non_olahan') {
            $request->validate([
                'stock' => 'required|integer',
                'weight' => 'required|numeric',
            ]);
        }

        if ($type == 'olahan') {
            $product = ProductOlahan::findOrFail($id);
        } else {
            $product = ProductNonOlahan::findOrFail($id);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image']);
            $imagePath = $request->file('image')->store('images', 'public');
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;

        if ($type == 'non_olahan') {
            $product->stock = $request->stock;
            $product->weight = $request->weight;
        }

        $product->save();

        return response()->json($product);
    }

    public function destroy($id, $type)
    {
        if ($type == 'olahan') {
            $product = ProductOlahan::findOrFail($id);
        } else {
            $product = ProductNonOlahan::findOrFail($id);
        }

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return response()->json(null, 204);
    }
}
