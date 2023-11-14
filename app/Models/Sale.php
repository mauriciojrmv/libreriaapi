<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $primaryKey = 'SaleID'; // Establece la clave primaria personalizada
    public $incrementing = true; // Si tu clave primaria es autoincremental
    protected $keyType = 'int'; // Asumiendo que el tipo de tu clave primaria es entera
    public $timestamps = false; // Desactiva los timestamps si no los utilizas en tu tabla

    protected $fillable = [
        'UserID', 'CustomerID', 'Fecha', 'Total'
    ];

    // Relación con User
    public function user() {
        return $this->belongsTo(User::class, 'UserID');
    }

    // Relación con Customer
    public function customer() {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }

    // Relación con SaleDetail
    public function saleDetails() {
        return $this->hasMany(SaleDetail::class, 'SaleID');
    }

    // Asegúrate de definir las propiedades para la conversión de tipos si es necesario
    protected $casts = [
        'Fecha' => 'date',
        'Total' => 'decimal:2',
    ];
}

