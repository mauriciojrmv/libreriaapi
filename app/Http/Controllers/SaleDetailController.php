<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleDetailController extends Controller
{
    public function index()
    {
        // Obtiene todos los detalles de las ventas incluyendo la venta y el producto asociado
        return response()->json(SaleDetail::with(['sale', 'product'])->get());
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'SaleID' => 'required|exists:sales,SaleID',
        'items' => 'required|array',
        'items.*.ProductID' => 'required|exists:products,ProductID',
        'items.*.Cantidad' => 'required|integer|min:1',
        'items.*.Precio' => 'required|numeric'
    ]);

    $saleDetails = [];
    $total = 0;

    // Utilizar transacciones para asegurar la integridad de la data
    DB::transaction(function () use (&$saleDetails, &$total, $validatedData) {
        foreach ($validatedData['items'] as $item) {
            $subtotal = $item['Cantidad'] * $item['Precio'];
            $total += $subtotal;

            $saleDetail = SaleDetail::create([
                'SaleID' => $validatedData['SaleID'],
                'ProductID' => $item['ProductID'],
                'Cantidad' => $item['Cantidad'],
                'Precio' => $item['Precio']
            ]);
            $saleDetails[] = $saleDetail;
        }

        // Actualizar el total en el registro de la venta
        $sale = Sale::find($validatedData['SaleID']);
        $sale->Total += $total; // Sumar al total existente si es necesario
        $sale->save();
    });

    return response()->json([
        'saledetails' => $saleDetails,
        'total' => $total
    ], 201);
}


    public function show($id)
    {
        // Obtiene un detalle de venta específico por su ID
        $saleDetail = SaleDetail::with(['sale', 'product'])->findOrFail($id);
        return response()->json($saleDetail);
    }

    public function update(Request $request, $id)
    {
        // Encuentra el detalle de la venta
        $saleDetail = SaleDetail::findOrFail($id);

        // Valida la entrada
        $validatedData = $request->validate([
            'SaleID' => 'exists:sales,SaleID',
            'ProductID' => 'exists:products,ProductID',
            'Cantidad' => 'integer',
            'Precio' => 'numeric'
        ]);

        // Actualiza el detalle de la venta
        $saleDetail->update($validatedData);
        return response()->json($saleDetail);
    }

    public function getSaleDetailsBySaleId($saleId) {
        $details = SaleDetail::where('SaleID', $saleId)->with(['sale', 'product'])->get();
        return response()->json($details);
    }

    public function destroy($id)
    {
        // Elimina el detalle de la venta
        $saleDetail = SaleDetail::findOrFail($id);
        $saleDetail->delete();
        return response()->json(null, 204);
    }
}

