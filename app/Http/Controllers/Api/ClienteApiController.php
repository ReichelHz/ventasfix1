<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteApiController extends Controller
{
    public function index()
    {
        return response()->json(Cliente::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'rut_empresa' => ['required', 'unique:clientes,rut_empresa', 'regex:/^\d{7,8}-[\dkK]$/'],
            'rubro' => 'required|string|max:100',
            'razon_social' => 'required|string|max:150',
            'telefono' => ['required', 'regex:/^\d{7,15}$/'],
            'direccion' => 'required|string|max:200',
            'nombre_contacto' => 'required|string|max:100',
            'email_contacto' => 'required|email|unique:clientes,email_contacto',
        ]);

        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
        $cliente->delete();
        return response()->json(['message' => 'Cliente eliminado']);
    }
}
