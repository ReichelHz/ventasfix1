@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">Nuestros Productos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg">Crear Producto</a>
    </div>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($producto->imagen_url)
                        <img src="{{ $producto->imagen_url }}" class="card-img-top" alt="{{ $producto->nombre }}" style="height:200px; object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">
                            <strong>SKU:</strong> {{ $producto->sku }}<br>
                            <strong>Descripción corta:</strong> {{ $producto->descripcion_corta }}<br>
                            <strong>Descripción larga:</strong> {{ $producto->descripcion_larga }}<br>
                            <strong>Precio Neto:</strong> ${{ number_format($producto->precio_neto, 2, ',', '.') }}<br>
                            <strong>Precio Venta (IVA 19%):</strong> ${{ number_format($producto->precio_venta, 2, ',', '.') }}<br>
                            <strong>Stock actual:</strong> {{ $producto->stock_actual }}<br>
                            <strong>Stock mínimo:</strong> {{ $producto->stock_minimo }}<br>
                            <strong>Stock bajo:</strong> {{ $producto->stock_bajo }}<br>
                            <strong>Stock alto:</strong> {{ $producto->stock_alto }}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro quieres eliminar este producto?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
