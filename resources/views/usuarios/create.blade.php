<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
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
            background: linear-gradient(135deg,#0062ff,#00c6ff);
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card p-4">
                <div class="card-header text-center bg-transparent border-0 mb-3">
                    <h3><i class="bi bi-person-plus"></i> Crear Usuario</h3>
                </div>

                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf

                    <!-- RUT -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-card-text form-icon"></i>
                        <input type="text" name="rut" class="form-control form-input" placeholder="12345678-9" value="{{ old('rut') }}" required>
                    </div>

                    <!-- Nombre -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" name="nombre" class="form-control form-input" placeholder="Nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <!-- Apellido -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" name="apellido" class="form-control form-input" placeholder="Apellido" value="{{ old('apellido') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-envelope form-icon"></i>
                        <input type="email" name="email" class="form-control form-input" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3 position-relative">
                        <i class="bi bi-lock form-icon"></i>
                        <input type="password" name="password" class="form-control form-input" placeholder="Contraseña" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-save btn-lg">Crear Usuario</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
