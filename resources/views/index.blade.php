@extends('layouts.main')

@section('title', 'Pagina de inicio')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <style>
        /* Estilo para las tarjetas de eventos */
        .card {
            border: 3px solid transparent; /* Los bordes dinámicos se aplican con JavaScript */
            border-radius: 10px;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
        }

        /* Opcional: para mejorar la visualización de la animación del cambio de color */
        .carousel-item {
            transition: transform 0.5s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Busqueda -->
    <div class="navbar-container">
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <img src="img/logonegro.png" alt="Logo" class="navbar-logo">
                <!-- Formulario de búsqueda -->
                <form class="d-flex search-form mx-2 flex-grow-1" role="search">
                    <input class="form-control rounded-border" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn search-btn" type="submit">
                        <img src="img/nav/magnifying-glass.svg" alt="Search">
                    </button>
                </form>
                <!-- Perfil de usuario -->
                <a href="{{ route('user') }}">
                    <img src="img/user/oso.jpg" alt="User Profile" class="user_profile">
                </a>
            </div>
        </nav>
    </div>

<!-- Proximos eventos -->
<div>
    <div class="header-container">
        <h1 class="header-title">Próximos eventos</h1>
        <a href="#" class="view-all-button">Ver todos <span class="arrow">➡️</span></a>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($proximos_eventos as $key => $evento)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <img src="{{ $evento->image }}" class="card-img-top card-image" alt="{{ $evento->titulo }}">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">{{ $evento->dia_evento }}</span>
                                        <span class="month d-block text-uppercase">{{ $evento->mes }}</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">{{ $evento->titulo }}</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> {{ $evento->ubicacion }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Destacados -->
<div>
    <div class="header-container">
        <h1 class="header-title">Destacados</h1>
        <a href="{{ route('destacados') }}" class="view-all-button">Conocer más <span class="arrow">➡️</span></a>
    </div>
    <div class="destacados">
        @foreach($destacados as $evento)
            <div class="card text-bg-dark">
                <div class="card-overlay">
                    <img src="{{ $evento->image }}" class="card-img" alt="{{ $evento->titulo }}">
                </div>
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title d-flex align-items-center">
                        {{ $evento->titulo }}
                        <img src="img/eventos/heart.svg" alt="heart icon" class="ms-5">
                    </h5>
                </div>
            </div>
            <br>
        @endforeach
    </div>
</div>


<x-nav></x-nav>
    <br><br>
<script>
        // Colores alternos: violeta, naranja, verde
        const colors = ['#A8C57B', '#B99BC9', '#F4A07C'];

        // Seleccionar todas las tarjetas
        const cards = document.querySelectorAll('.card');

        // Aplicar colores a los bordes en orden cíclico
        cards.forEach((card, index) => {
            const colorIndex = index % colors.length;
            card.style.borderColor = colors[colorIndex];
        });
    </script>

</body>
</html>

@endsection




