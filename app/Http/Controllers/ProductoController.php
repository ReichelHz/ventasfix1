<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $productos = \App\Models\Producto::all();
    return view('productos.index', compact('productos'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('productos.create');
}

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
    ]);

 
    \App\Models\Producto::create([
        'nombre' => $request->nombre,
        'precio' => $request->precio,
    ]);

  
    return redirect()->route('productos.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $producto = \App\Models\Producto::findOrFail($id);
    return view('productos.edit', compact('producto'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
    ]);

    $producto = \App\Models\Producto::findOrFail($id);
    $producto->update([
        'nombre' => $request->nombre,
        'precio' => $request->precio,
    ]);
 
    return redirect()->route('productos.index');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $producto = \App\Models\Producto::findOrFail($id);
    $producto->delete();

    return redirect()->route('productos.index');
}

}
 