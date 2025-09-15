@extends('layouts.app') 
@section('title', 'Clientes')

@section('head')
<link rel="stylesheet" href="{{ asset('css/clientes.css') }}">
@endsection

@section('content')
<div class="py-4">
    <h1 class="text-center mb-4" style="color:#0D6EFD;font-weight:700;font-size:2.2rem;">Clientes <span class="badge bg-danger" style="font-size:1rem;vertical-align:middle;">{{ count($clientes) }}</span></h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('clientes.create') }}" class="btn btn-success btn-create" style="background-color:#22c55e;">
            <i class="bi bi-person-plus"></i> Crear Cliente
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('clientes.index') }}" class="mb-3 d-flex justify-content-end gap-2">
        <input type="number" name="id" class="form-control" placeholder="Filtrar por ID" style="max-width:160px;">
        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
    </form>
    <div class="card shadow border-0 vuexy-card" style="transition:box-shadow 0.3s;">
        <div class="card-body p-0" style="background:linear-gradient(90deg,#f8fafc 60%,#e0e7ff 100%);">
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
@section('css')
<style>
    .vuexy-card:hover { box-shadow: 0 0 0.75rem #0D6EFD33; }
    .btn:active, .btn:focus { box-shadow: 0 0 0.25rem #0D6EFD66; }
    .badge { font-size: 0.95em; }
    /* Spinner de carga ejemplo */
    .vuexy-spinner { display:none; position:fixed; top:50%; left:50%; z-index:9999; }
    .vuexy-spinner.active { display:block; }
</style>
@endsection
@section('footer')
<script>
// Ejemplo de spinner de carga
function showSpinner() {
    document.querySelector('.vuexy-spinner').classList.add('active');
}
function hideSpinner() {
    document.querySelector('.vuexy-spinner').classList.remove('active');
}
</script>
<div class="vuexy-spinner">
    <div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status">
        <span class="visually-hidden">Cargando...</span>
    </div>
</div>
@endsection
                    <tbody>
                        @if(request('id') && $clientes->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">ID no encontrado.</td>
                            </tr>
                        @else
                            @forelse($clientes as $cliente)
                            <tr style="transition:background 0.2s;">
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->rut_empresa }}</td>
                                <td>{{ $cliente->rubro }}</td>
                                <td>{{ $cliente->razon_social }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->nombre_contacto }}</td>
                                <td>{{ $cliente->email_contacto }}</td>
                                <td class="d-flex flex-wrap justify-content-center gap-2">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm" style="background-color:#0D6EFD;transition:box-shadow 0.2s;">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="background-color:#ea5455;transition:box-shadow 0.2s;"
                                            onclick="return confirm('¿Eliminar este cliente?')">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No hay clientes registrados.</td>
                            </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
