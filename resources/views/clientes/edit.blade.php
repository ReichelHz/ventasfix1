<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/clientes.css') }}">

    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 1rem; }
        .btn-primary { background-color: #004F92; border-color: #004F92; }
        .btn-primary:hover { background-color: #003f73; border-color: #003f73; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Editar Cliente</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="rut_empresa" class="form-label">RUT Empresa</label>
                        <input type="text" name="rut_empresa" class="form-control" value="{{ old('rut_empresa', $cliente->rut_empresa) }}" required pattern="\d{7,8}-[\dkK]" title="Formato: 12345678-9">
                    </div>
                    <div class="mb-3">
                        <label for="rubro" class="form-label">Rubro</label>
                        <input type="text" name="rubro" class="form-control" value="{{ old('rubro', $cliente->rubro) }}" required maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="form-label">Razón Social</label>
                        <input type="text" name="razon_social" class="form-control" value="{{ old('razon_social', $cliente->razon_social) }}" required maxlength="150">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" required pattern="\d{7,15}" title="Solo números, 7-15 dígitos">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion) }}" required maxlength="200">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_contacto" class="form-label">Nombre Contacto</label>
                        <input type="text" name="nombre_contacto" class="form-control" value="{{ old('nombre_contacto', $cliente->nombre_contacto) }}" required maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="email_contacto" class="form-label">Email Contacto</label>
                        <input type="email" name="email_contacto" class="form-control" value="{{ old('email_contacto', $cliente->email_contacto) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Actualizar Cliente</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
    