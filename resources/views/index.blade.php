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
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <img src="img/prox_eventos/ceramica_vino.jpg" class="card-img-top card-image" alt="...">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">7</span>
                                        <span class="month d-block text-uppercase">Dic</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">Cerámica y Vino</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> Taller Obra, Palermo.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <img src="img/prox_eventos/joyeria.jpg" class="card-img-top card-image" alt="...">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">10</span>
                                        <span class="month d-block text-uppercase">Dic</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">Joyería y Piedras</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> El Patio, Berazategui.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <img src="img/prox_eventos/show.jpg" class="card-img-top card-image" alt="...">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">12</span>
                                        <span class="month d-block text-uppercase">Dic</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">Show en vivo</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> Hipódromo de Palermo
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <img src="img/prox_eventos/cena_vela.jpg" class="card-img-top card-image" alt="...">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">22</span>
                                        <span class="month d-block text-uppercase">Dic</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">Cena de velas</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> Hortaleza, Caballito
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <img src="img/prox_eventos/cocina.jpg" class="card-img-top card-image" alt="...">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">7</span>
                                        <span class="month d-block text-uppercase">Dic</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">Primeros pasos Cocinando</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> IAG, Acassuso
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <img src="img/destacados/fogon.jpg" class="card-img-top card-image" alt="...">
                                <div class="card-body d-flex align-items-center">
                                    <div class="event-date rounded text-center me-1 col-3">
                                        <span class="day d-block fw-bold">27</span>
                                        <span class="month d-block text-uppercase">Dic</span>
                                    </div>
                                    <div class="event-info">
                                        <h5 class="card-title mb-1">Fogón</h5>
                                        <p class="card-text text-muted">
                                            <span class="location-icon">📍</span> Necochea, Buenos Aires
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <!-- Tarjetas destacadas aquí -->
        <div class="card text-bg-dark">
            <div class="card-overlay">
                <img src="img/destacados/ceramica.jpg" class="card-img" alt="...">
            </div>
            <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title d-flex align-items-center">
                    Cerámica Ritual by Fina Dane
                    <img src="img/eventos/heart.svg" alt="heart icon" class="ms-5">
                </h5>
            </div>
        </div>
        <br>
        <div class="card text-bg-dark">
            <div class="card-overlay">
                <img src="img/destacados/taller_cocina.jpg" class="card-img" alt="...">
            </div>
            <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title d-flex align-items-center">
                    Sabores Ancestrales by Culinaria Viva
                    <img src="img/eventos/heart.svg" alt="heart icon" class="ms-5">
                </h5>
            </div>
        </div>
        <br>
        <!-- Nueva tarjeta destacada 1 -->
        <div class="card text-bg-dark">
            <div class="card-overlay">
                <img src="img/destacados/cerveza.jpg" class="card-img" alt="...">
            </div>
            <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title d-flex align-items-center">
                    Cata Salvaje by Maestros Cerveceros
                    <img src="img/eventos/heart.svg" alt="heart icon" class="ms-5">
                </h5>
            </div>
        </div>
        <br>
        <!-- Nueva tarjeta destacada 2 -->
        <div class="card text-bg-dark">
            <div class="card-overlay">
                <img src="img/destacados/movie.jpg" class="card-img" alt="...">
            </div>
            <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title d-flex align-items-center">
                    Proyecciones al Viento by Cine Libre
                    <img src="img/eventos/heart.svg" alt="heart icon" class="ms-5">
                </h5>
            </div>
        </div>
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




