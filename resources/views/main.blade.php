<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Farmacia</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('alta') }}">alta</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reporte') }}">reporte</a></li>
            </ul>
        </div>
    </div>
</nav>

{{-- Si quieres imagen solo en el inicio, NO aquí (mejor en welcome.blade.php). --}}
{{-- <div class="d-flex justify-content-center align-items-center vh-100">
    <img src="{{ asset('imagenes/farmacia imagen principal.jpeg') }}" class="img-fluid opacity-75" alt="Logo">
</div> --}}

<div class="container mt-5 pt-5 text-white">
    @yield('contenido')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

