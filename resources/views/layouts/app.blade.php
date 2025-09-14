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
    <div class="container mt-5">
        @yield('content')
    </div>

   
    <script src="{{ asset('vuexy/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
