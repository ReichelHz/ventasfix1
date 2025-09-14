<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
    <div class="container">
        <h1>Crear Producto</h1>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>

            <label for="precio">Precio Neto:</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio') }}" step="0.01" required>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</body>
</html>
