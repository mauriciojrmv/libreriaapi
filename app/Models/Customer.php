<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'CustomerID'; // Define la clave primaria personalizada
    public $incrementing = true; // Asumiendo que tu clave primaria es autoincremental
    protected $keyType = 'int'; // Asumiendo que el tipo de tu clave primaria es entera
    public $timestamps = false; // Desactiva los timestamps si no los utilizas en tu tabla

    // Lista de campos asignables masivamente
    protected $fillable = [
        'Nombre',
        'Email',
        'Teléfono'
    ];

    // Relación con ventas (Sale)
    public function sales() {
        return $this->hasMany(Sale::class, 'CustomerID');
    }
}
