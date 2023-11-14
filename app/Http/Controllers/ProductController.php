<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Incluye la relación 'category' si es necesario
        return response()->json(Product::with('category')->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nombre' => 'required|max:255',
            'Descripción' => 'required',
            'Precio' => 'required|numeric',
            'Stock' => 'required|integer',
            'CategoryID' => 'required|exists:categories,CategoryID',
            'Autor' => 'required|max:255' // Añade la validación para 'Autor'
        ]);

        $product = Product::create($validatedData);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'Nombre' => 'max:255',
            'Descripción' => 'nullable',
            'Precio' => 'numeric',
            'Stock' => 'integer',
            'CategoryID' => 'exists:categories,CategoryID',
            'Autor' => 'max:255' // Añade la validación para 'Autor'
        ]);

        $product->update($validatedData);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}

