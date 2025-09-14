<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
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
    ], [
        'rut_empresa.regex' => 'El RUT debe tener el formato 12345678-9',
        'telefono.regex' => 'El teléfono debe contener solo números (7-15 dígitos)',
    ]);

    Cliente::create($request->all());

    return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
}

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
{
    $cliente = Cliente::findOrFail($id);

    $request->validate([
        'rut_empresa' => ['required', 'regex:/^\d{7,8}-[\dkK]$/', 'unique:clientes,rut_empresa,' . $cliente->id],
        'rubro' => 'required|string|max:100',
        'razon_social' => 'required|string|max:150',
        'telefono' => ['required', 'regex:/^\d{7,15}$/'],
        'direccion' => 'required|string|max:200',
        'nombre_contacto' => 'required|string|max:100',
        'email_contacto' => 'required|email|unique:clientes,email_contacto,' . $cliente->id,
    ], [
        'rut_empresa.regex' => 'El RUT debe tener el formato 12345678-9',
        'telefono.regex' => 'El teléfono debe contener solo números (7-15 dígitos)',
    ]);

    $cliente->update($request->all());

    return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
}
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
