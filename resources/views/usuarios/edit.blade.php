<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .form-input {
            padding-left: 2.5rem;
        }
        .btn-save {
            background: linear-gradient(135deg,#ff6b6b,#ff9f43);
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

      
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card p-4">
                <div class="card-header text-center bg-transparent border-0 mb-3">
                    <h3><i class="bi bi-person-lines-fill"></i> Editar Usuario</h3>
                </div>

                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                  
                    <div class="mb-3 position-relative">
                        <i class="bi bi-card-text form-icon"></i>
                        <input type="text" name="rut" class="form-control form-input" value="{{ old('rut', $usuario->rut) }}" required>
                    </div>

             
                    <div class="mb-3 position-relative">
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" name="nombre" class="form-control form-input" value="{{ old('nombre', $usuario->nombre) }}" required>
                    </div>

                    <div class="mb-3 position-relative">
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" name="apellido" class="form-control form-input" value="{{ old('apellido', $usuario->apellido) }}" required>
                    </div>

                    <div class="mb-3 position-relative">
                        <i class="bi bi-envelope form-icon">
