<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'nombre',
        'descripcion_corta',
        'descripcion_larga',
        'imagen_url',
        'precio_neto',
        'precio_venta',
        'stock_actual',
        'stock_minimo',
        'stock_bajo',
        'stock_alto',
    ];

    public $timestamps = true;

    // Calcula automáticamente el precio de venta al crear o actualizar
    protected static function booted()
    {
        static::creating(function ($producto) {
            $producto->precio_venta = $producto->precio_neto * 1.19;
        });

        static::updating(function ($producto) {
            $producto->precio_venta = $producto->precio_neto * 1.19;
        });
    }
}
