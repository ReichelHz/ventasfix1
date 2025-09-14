@extends('layouts.app') 
@section('title', 'Clientes')

@section('head')
<link rel="stylesheet" href="{{ asset('css/clientes.css') }}">
@endsection

@section('content')
<div class="py-4">
    <h1 class="text-center mb-4" style="color:#0D6EFD;font-weight:700;font-size:2.2rem;">Clientes</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('clientes.create') }}" class="btn btn-success btn-create" style="background-color:#22c55e;">
            <i class="bi bi-person-plus-fill"></i> Crear Cliente
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0 vuexy-card">
        <div class="card-body p-0">
            <div class="alert alert-info d-block d-md-none mb-2" style="font-size:0.95rem;">
                <i class="bi bi-arrow-left-right"></i> Desliza horizontalmente para ver toda la tabla.
            </div>
            <div class="table-responsive" style="overflow-x:auto; scrollbar-width:thin;">
                <table class="table table-hover table-bordered align-middle mb-0 vuexy-table">
                    <thead class="table-light">
                        <tr style="background:#e0e7ff;color:#0D6EFD;">
                            <th>ID</th>
                            <th>RUT Empresa</th>
                            <th>Rubro</th>
                            <th>Razón Social</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Nombre Contacto</th>
                            <th>Email Contacto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->rut_empresa }}</td>
                            <td>{{ $cliente->rubro }}</td>
                            <td>{{ $cliente->razon_social }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->nombre_contacto }}</td>
                            <td>{{ $cliente->email_contacto }}</td>
                            <td class="d-flex flex-wrap justify-content-center gap-2">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm" style="background-color:#0D6EFD;">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="background-color:#ea5455;"
                                        onclick="return confirm('¿Eliminar este cliente?')">
                                        <i class="bi bi-trash-fill"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No hay clientes registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
