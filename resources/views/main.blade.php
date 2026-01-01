<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <!-- Bootstrap CSS (CDN o local) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

<!-- Navbar fijo arriba -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Farmacia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('productos') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contacto') }}">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Imagen de fondo full screen -->
<div class="d-flex justify-content-center align-items-center vh-100">
    <img src="{{ asset('imagenes/farmacia imagen principal.jpeg') }}" class="img-fluid opacity-75" alt="Logo">
</div>

<!-- Bootstrap JS (CDN o local) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
