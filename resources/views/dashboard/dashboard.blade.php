
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-5">
    <h1 class="text-center" style="color:#0D6EFD; font-weight:700; font-size:2.5rem; margin-bottom:2.5rem;">Dashboard</h1>
    <div class="row justify-content-center">
        <!-- Usuarios -->
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card card-body text-center shadow border-0 bg-white vuexy-card">
                <div class="avatar bg-light-primary rounded-circle mb-2 mx-auto" style="width:60px;height:60px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-person-lines-fill" style="font-size:2rem;color:#0D6EFD;"></i>
                </div>
                <h5 class="fw-bold mb-1" style="color:#0D6EFD;">Usuarios</h5>
                <p class="fs-2 fw-bold mb-2">{{ $usuarios_count }}</p>
                <a href="{{ route('usuarios.create') }}" class="btn btn-success w-100 mb-2">Crear Usuario</a>
                <a href="{{ route('usuarios.index') }}" class="btn btn-primary w-100">Ver / Gestionar</a>
            </div>
        </div>
        <!-- Productos -->
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card card-body text-center shadow border-0 bg-white vuexy-card">
                <div class="avatar bg-light-success rounded-circle mb-2 mx-auto" style="width:60px;height:60px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-box-seam" style="font-size:2rem;color:#22c55e;"></i>
                </div>
                <h5 class="fw-bold mb-1" style="color:#22c55e;">Productos</h5>
                <p class="fs-2 fw-bold mb-2">{{ $productos_count }}</p>
                <a href="{{ route('productos.create') }}" class="btn btn-success w-100 mb-2">Crear Producto</a>
                <a href="{{ route('productos.index') }}" class="btn btn-primary w-100">Ver / Gestionar</a>
            </div>
        </div>
        <!-- Clientes -->
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card card-body text-center shadow border-0 bg-white vuexy-card">
                <div class="avatar bg-light-danger rounded-circle mb-2 mx-auto" style="width:60px;height:60px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-people-fill" style="font-size:2rem;color:#ea5455;"></i>
                </div>
                <h5 class="fw-bold mb-1" style="color:#ea5455;">Clientes</h5>
                <p class="fs-2 fw-bold mb-2">{{ $clientes_count }}</p>
                <a href="{{ route('clientes.create') }}" class="btn btn-success w-100 mb-2">Crear Cliente</a>
                <a href="{{ route('clientes.index') }}" class="btn btn-primary w-100">Ver / Gestionar</a>
            </div>
        </div>
    </div>
</div>
@endsection
