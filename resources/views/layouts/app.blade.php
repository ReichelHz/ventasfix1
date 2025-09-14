<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VentasFix')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <link rel="stylesheet" href="{{ asset('vuexy/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/css/style.css') }}">

  
    @yield('css')  
</head>
<body>
    <!-- Vuexy Navbar Única -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow vuexy-navbar">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href="/dashboard">VentasFix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/usuarios">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="/productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/clientes">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="/logout">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid p-4 vuexy-main">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
