<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nombre' => 'required|max:255',
            'Descripción' => 'nullable'
        ]);

        $category = Category::create([
            'Nombre' => $validatedData['Nombre'],
            'Descripción' => $validatedData['Descripción']
        ]);

        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'Nombre' => 'max:255',
            'Descripción' => 'nullable'
        ]);

        $category->update([
            'Nombre' => $validatedData['Nombre'],
            'Descripción' => $validatedData['Descripción']
        ]);

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
