@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('head')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('css')
<style>
    .vuexy-card:hover { box-shadow: 0 0 0.75rem #0D6EFD33; }
    .btn:active, .btn:focus { box-shadow: 0 0 0.25rem #0D6EFD66; }
    .badge { font-size: 0.95em; }
    /* Spinner de carga */
    .vuexy-spinner { display:none; position:fixed; top:50%; left:50%; z-index:9999; }
    .vuexy-spinner.active { display:block; }
</style>
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">
        Nuestros Productos 
        <span class="badge bg-success" style="font-size:1rem;vertical-align:middle;">
            {{ count($productos) }}
        </span>
    </h2>

    @if(session('success'))
        <div class="alert alert-success vuexy-alert">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('productos.index') }}" class="mb-3 d-flex justify-content-end gap-2">
        <input type="text" name="sku" class="form-control" placeholder="Filtrar por SKU" style="max-width:160px;">
        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
    </form>

    <div class="mb-4">
        <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg vuexy-btn">
            <i class="bi bi-plus-square"></i> Crear Producto
        </a>
    </div>

    <div class="row">
        @if(request('sku') && $productos->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning text-center">SKU no encontrado.</div>
            </div>
        @else
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
        @endif
    </div>
</div>
@endsection

@section('footer')
<script>
    // Spinner de carga ejemplo
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
