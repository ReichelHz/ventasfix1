@extends('layouts.app') {{-- Ajusta según tu layout --}}

@section('title', 'Crear Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/clientes.css') }}">

<div class="container mt-4">
    <h2 class="mb-4">Crear Producto</h2>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos errores en el formulario:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="descripcion_corta" class="form-label">Descripción Corta</label>
                <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="descripcion_larga" class="form-label">Descripción Larga</label>
                <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="3" required>{{ old('descripcion_larga') }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="imagen_url" class="form-label">URL de Imagen</label>
                <input type="url" class="form-control" id="imagen_url" name="imagen_url" value="{{ old('imagen_url') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio_neto" class="form-label">Precio Neto</label>
                <input type="number" class="form-control" id="precio_neto" name="precio_neto" value="{{ old('precio_neto') }}" step="0.01" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="stock_actual" class="form-label">Stock Actual</label>
                <input type="number" class="form-control" id="stock_actual" name="stock_actual" value="{{ old('stock_actual') }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" value="{{ old('stock_minimo') }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="stock_bajo" class="form-label">Stock Bajo</label>
                <input type="number" class="form-control" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo') }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="stock_alto" class="form-label">Stock Alto</label>
                <input type="number" class="form-control" id="stock_alto" name="stock_alto" value="{{ old('stock_alto') }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </form>
</div>
@endsection
