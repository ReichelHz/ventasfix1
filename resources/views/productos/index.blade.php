@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">Nuestros Productos <span class="badge bg-success" style="font-size:1rem;vertical-align:middle;">{{ count($productos) }}</span></h2>

    @if(session('success'))
        <div class="alert alert-success vuexy-alert">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
    <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg vuexy-btn"><i class="bi bi-plus-square"></i> Crear Producto</a>
    </div>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow vuexy-card border-0">
                    @if($producto->imagen_url)
                        <img src="{{ $producto->imagen_url }}" class="card-img-top vuexy-img" alt="{{ $producto->nombre }}" style="height:200px; object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title vuexy-title">{{ $producto->nombre }}</h5>
                        <table class="table table-hover table-bordered align-middle mb-0 vuexy-table">
                            <tr><th>SKU</th><td>{{ $producto->sku }}</td></tr>
                            <tr><th>Descripción corta</th><td>{{ $producto->descripcion_corta }}</td></tr>
                            <tr><th>Descripción larga</th><td>{{ $producto->descripcion_larga }}</td></tr>
                            <tr><th>Precio Neto</th><td>${{ number_format($producto->precio_neto, 2, ',', '.') }}</td></tr>
                            <tr><th>Precio Venta (IVA 19%)</th><td>${{ number_format($producto->precio_venta, 2, ',', '.') }}</td></tr>
                            <tr><th>Stock actual</th><td>{{ $producto->stock_actual }}</td></tr>
                            <tr><th>Stock mínimo</th><td>{{ $producto->stock_minimo }}</td></tr>
                            <tr><th>Stock bajo</th><td>{{ $producto->stock_bajo }}</td></tr>
                            <tr><th>Stock alto</th><td>{{ $producto->stock_alto }}</td></tr>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning vuexy-btn">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger vuexy-btn" onclick="return confirm('¿Seguro quieres eliminar este producto?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
