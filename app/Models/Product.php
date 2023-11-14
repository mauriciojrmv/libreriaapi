<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProductID'; // Clave primaria personalizada
    public $incrementing = true; // Si tu clave primaria es autoincremental
    protected $keyType = 'int'; // Asumiendo que el tipo de tu clave primaria es entera
    public $timestamps = false; // Desactiva los timestamps si no los utilizas en tu tabla

    protected $fillable = [
        'Nombre', 'Descripción', 'Precio', 'Stock', 'CategoryID', 'Autor'
    ];

    // Relación con Category
    public function category() {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    // Relación con SaleDetail
    public function saleDetails() {
        return $this->hasMany(SaleDetail::class, 'ProductID');
    }

    // Asegúrate de definir las propiedades para la conversión de tipos si es necesario
    // Por ejemplo, para asegurarte de que los campos monetarios se traten como decimales:
    protected $casts = [
        'Precio' => 'decimal:2',
    ];
}
