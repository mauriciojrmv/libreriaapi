<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Devuelve todos los clientes en formato JSON
        return response()->json(Customer::all());
    }

    public function store(Request $request)
    {
        // Valida los datos de entrada con los nombres de las columnas correctos
        $validatedData = $request->validate([
            'Nombre' => 'required|max:255',
            'Email' => 'required|email|unique:customers,Email',
            'Teléfono' => 'nullable'
        ]);

        // Crea el cliente con los datos validados
        $customer = Customer::create($validatedData);
        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        // Devuelve los datos del cliente específico en formato JSON
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        // Valida los datos de entrada asegurándote de excluir el cliente actual del chequeo 'unique'
        $validatedData = $request->validate([
            'Nombre' => 'max:255',
            'Email' => 'email|unique:customers,Email,' . $customer->CustomerID,
            'Teléfono' => 'nullable'
        ]);

        // Actualiza el cliente con los datos validados
        $customer->update($validatedData);
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        // Elimina el cliente y devuelve una respuesta vacía con código de estado 204
        $customer->delete();
        return response()->json(null, 204);
    }
}


