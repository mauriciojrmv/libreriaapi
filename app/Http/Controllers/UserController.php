<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Asumiendo que quieres devolver todos los usuarios
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        // Asegúrate de que los nombres de los campos coincidan con los de tu base de datos
        $validatedData = $request->validate([
            'Nombre' => 'required|max:255',
            'Email' => 'required|email|unique:users,Email', // Usa el nombre de la columna de la base de datos
            'Contraseña' => 'required', // 'Contraseña' es el nombre de la columna en la base de datos
            'Rol' => 'required'
        ]);

        // Asegúrate de encriptar la contraseña antes de guardarla
        $validatedData['Contraseña'] = Hash::make($validatedData['Contraseña']);

        // Crea el usuario con los datos validados
        $user = User::create($validatedData);

        // Devuelve la respuesta
        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        // Devuelve los datos del usuario
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        // Valida y actualiza el usuario
        $validatedData = $request->validate([
            'Nombre' => 'max:255',
            'Email' => 'email|unique:users,Email,' . $user->UserID, // Excluye el email actual del usuario
            'Rol' => ''
        ]);

        // Si se incluye una nueva contraseña, asegúrate de encriptarla
        if ($request->filled('Contraseña')) {
            $validatedData['Contraseña'] = Hash::make($request->Contraseña);
        }

        // Actualiza el usuario
        $user->update($validatedData);

        // Devuelve la respuesta
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        // Elimina el usuario
        $user->delete();

        // Devuelve la respuesta
        return response()->json(null, 204);
    }
}
