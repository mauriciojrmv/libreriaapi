<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'CategoryID';

    // Especificar qué campos son asignables masivamente.
    protected $fillable = [
        'Nombre', 'Descripción'
    ];

    /**
     * Get the products for the category.
     */
    public function products() {
        return $this->hasMany(Product::class, 'CategoryID');
    }

    // Si decides usar timestamps, añadelos aquí, si no, desactívalos
    public $timestamps = false;
}
