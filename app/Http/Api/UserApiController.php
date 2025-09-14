<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserApiController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rut' => ['required', 'unique:users,rut', 'regex:/^\d{7,8}-[0-9kK]$/'],
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $usuario = User::create([
            'rut' => $request->rut,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $validated = $request->validate([
            'rut' => ['required', 'regex:/^\d{7,8}-[0-9kK]$/', 'unique:users,rut,' . $usuario->id],
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|min:6',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $usuario->update($validated);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente.']);
    }
}
