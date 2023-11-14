<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Incluye las relaciones 'user' y 'customer' si es necesario
        return response()->json(Sale::with(['user', 'customer'])->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'UserID' => 'required|exists:users,UserID',
            'CustomerID' => 'required|exists:customers,CustomerID',
            'Fecha' => 'required|date',
            'Total' => 'required|numeric'
        ]);

        $sale = Sale::create($validatedData);
        return response()->json($sale, 201);
    }

    public function show($id)
    {
        // Incluye las relaciones 'user', 'customer', y 'saleDetails' si es necesario
        $sale = Sale::with(['user', 'customer', 'saleDetails'])->findOrFail($id);
        return response()->json($sale);
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $validatedData = $request->validate([
            'UserID' => 'exists:users,UserID',
            'CustomerID' => 'exists:customers,CustomerID',
            'Fecha' => 'date',
            'Total' => 'numeric'
        ]);

        $sale->update($validatedData);
        return response()->json($sale);
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return response()->json(null, 204);
    }
}


