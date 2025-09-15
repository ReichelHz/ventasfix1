<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Mostrar todos los usuarios o filtrar por ID
    public function index(Request $request)
    {
        if ($request->has('id') && $request->id != '') {
            $usuarios = User::where('id', $request->id)->get();
        } else {
            $usuarios = User::all();
        }

        return view('usuarios.index', compact('usuarios'));
    }

    // Formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'rut' => ['required', 'unique:users,rut', 'regex:/^\d{7,8}-[0-9kK]$/'],
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'rut.regex' => 'El RUT debe tener el formato 12345678-9 o 1234567-K',
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute debe ser un correo válido.',
            'unique' => 'El valor de :attribute ya ha sido registrado.',
            'min.string' => 'El campo :attribute debe tener al menos :min caracteres.',
        ]);

        User::create([
            'rut' => $request->rut,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar un usuario específico por ID
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // Formulario para editar un usuario
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'rut' => ['required', 'regex:/^\d{7,8}-[0-9kK]$/', 'unique:users,rut,'.$id],
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ], [
            'rut.regex' => 'El RUT debe tener el formato 12345678-9 o 1234567-K',
            'email.unique' => 'El valor de email ya ha sido registrado.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
        ]);

        $usuario->update([
            'rut' => $request->rut,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario eliminado correctamente.');
    }
}
