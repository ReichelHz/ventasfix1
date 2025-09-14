<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class ClienteApiController extends Controller
{
    public function index()
    {
        try {
            $clientes = Cliente::all();
            return response()->json($clientes, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error al obtener clientes', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'rut_empresa'    => 'required|unique:clientes,rut_empresa|regex:/^\d{7,8}-[\dkK]$/',
                'rubro'          => 'required|string|max:100',
                'razon_social'   => 'required|string|max:150',
                'telefono'       => 'required|regex:/^\d{7,15}$/',
                'direccion'      => 'required|string|max:200',
                'nombre_contacto'=> 'required|string|max:100',
                'email_contacto' => 'required|email|unique:clientes,email_contacto',
            ], [
                'rut_empresa.regex' => 'El RUT debe tener el formato 12345678-9',
                'telefono.regex'    => 'El teléfono debe contener solo números (7-15 dígitos)',
            ]);

            $cliente = Cliente::create($validated);

            return response()->json([
                'message' => 'Cliente creado correctamente',
                'data'    => $cliente
            ], 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error al crear cliente', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
        return response()->json($cliente, 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        try {
            $validated = $request->validate([
                'rut_empresa'    => 'required|regex:/^\d{7,8}-[\dkK]$/|unique:clientes,rut_empresa,' . $cliente->id,
                'rubro'          => 'required|string|max:100',
                'razon_social'   => 'required|string|max:150',
                'telefono'       => 'required|regex:/^\d{7,15}$/',
                'direccion'      => 'required|string|max:200',
                'nombre_contacto'=> 'required|string|max:100',
                'email_contacto' => 'required|email|unique:clientes,email_contacto,' . $cliente->id,
            ], [
                'rut_empresa.regex' => 'El RUT debe tener el formato 12345678-9',
                'telefono.regex'    => 'El teléfono debe contener solo números (7-15 dígitos)',
            ]);

            $cliente->update($validated);

            return response()->json([
                'message' => 'Cliente actualizado correctamente',
                'data'    => $cliente
            ], 200);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error al actualizar cliente', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        try {
            $cliente->delete();
            return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error al eliminar cliente', 'message' => $e->getMessage()], 500);
        }
    }
}
