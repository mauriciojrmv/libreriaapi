<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $table = 'saledetails'; // Asegúrate de que coincida con el nombre de la tabla en la base de datos

    protected $primaryKey = 'SaleDetailID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'SaleID', 'ProductID', 'Cantidad', 'Precio'
    ];

    public function sale() {
        return $this->belongsTo(Sale::class, 'SaleID');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    protected $casts = [
        'Precio' => 'decimal:2',
    ];
}

