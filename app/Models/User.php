<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Importar el trait HasApiTokens

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Añadir el trait HasApiTokens

    protected $primaryKey = 'UserID'; // Configura la clave primaria personalizada

    protected $fillable = [
        'Nombre',
        'Email',
        'Contraseña',
        'Rol',
    ];

    protected $hidden = [
        'Contraseña', // Ocultar la contraseña en las respuestas JSON
    ];

    public $timestamps = false; // Configurar si el modelo debe usar timestamps

    // Otras propiedades y métodos de tu modelo...
}
