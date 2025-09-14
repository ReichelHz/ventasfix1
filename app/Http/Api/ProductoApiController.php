<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoApiController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|unique:productos,sku',
            'nombre' => 'required|string|max:255',
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'imagen_url' => 'nullable|url',
            'precio_neto' => 'required|numeric',
            'stock_actual' => 'required|integer',
            'stock_minimo' => 'required|integer',
            'stock_bajo' => 'required|integer',
            'stock_alto' => 'required|integer',
        ]);

        $validated['precio_venta'] = $validated['precio_neto'] * 1.19;

        $producto = Producto::create($validated);
        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validated = $request->validate([
            'sku' => 'required|string|unique:productos,sku,' . $producto->id,
            'nombre' => 'required|string|max:255',
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'imagen_url' => 'nullable|url',
            'precio_neto' => 'required|numeric',
            'stock_actual' => 'required|integer',
            'stock_minimo' => 'required|integer',
            'stock_bajo' => 'required|integer',
            'stock_alto' => 'required|integer',
        ]);

        $validated['precio_venta'] = $validated['precio_neto'] * 1.19;

        $producto->update($validated);
        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado correctamente.']);
    }
}
