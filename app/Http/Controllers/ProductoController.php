<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $producto = new Producto();
        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->imagen_url = $request->imagen_url;
        $producto->precio_neto = $request->precio_neto;
        $producto->precio_venta = $request->precio_neto * 1.19;
        $producto->stock_actual = $request->stock_actual;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->stock_bajo = $request->stock_bajo;
        $producto->stock_alto = $request->stock_alto;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sku' => 'required|string|unique:productos,sku,' . $id,
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

        $producto = Producto::findOrFail($id);
        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->imagen_url = $request->imagen_url;
        $producto->precio_neto = $request->precio_neto;
        $producto->precio_venta = $request->precio_neto * 1.19;
        $producto->stock_actual = $request->stock_actual;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->stock_bajo = $request->stock_bajo;
        $producto->stock_alto = $request->stock_alto;
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
