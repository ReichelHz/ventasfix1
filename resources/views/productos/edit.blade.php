@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Editar Producto</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>¡Ups!</strong> Corrige los siguientes errores:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $producto->sku) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descripcion_corta" class="form-label">Descripción Corta</label>
                    <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta', $producto->descripcion_corta) }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion_larga" class="form-label">Descripción Larga</label>
                    <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="3" required>{{ old('descripcion_larga', $producto->descripcion_larga) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen_url" class="form-label">URL de Imagen</label>
                    <input type="url" class="form-control" id="imagen_url" name="imagen_url" value="{{ old('imagen_url', $producto->imagen_url) }}">
                    @if($producto->imagen_url)
                        <img src="{{ $producto->imagen_url }}" alt="Imagen del producto" class="img-fluid mt-2" style="max-height:150px;">
                    @endif
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="precio_neto" class="form-label">Precio Neto</label>
                        <input type="number" step="0.01" class="form-control" id="precio_neto" name="precio_neto" value="{{ old('precio_neto', $producto->precio_neto) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Precio Venta (IVA 19%)</label>
                        <input type="text" class="form-control" value="${{ number_format($producto->precio_neto * 1.19, 2, ',', '.') }}" disabled>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="stock_actual" class="form-label">Stock Actual</label>
                        <input type="number" class="form-control" id="stock_actual" name="stock_actual" value="{{ old('stock_actual', $producto->stock_actual) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                        <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" value="{{ old('stock_minimo', $producto->stock_minimo) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="stock_bajo" class="form-label">Stock Bajo</label>
                        <input type="number" class="form-control" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo', $producto->stock_bajo) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="stock_alto" class="form-label">Stock Alto</label>
                        <input type="number" class="form-control" id="stock_alto" name="stock_alto" value="{{ old('stock_alto', $producto->stock_alto) }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver a la lista</a>
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
