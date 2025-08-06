@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<div>
    <!-- Busqueda -->
    <div class="navbar-container">
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <img src="img/logonegro.png" alt="Logo" class="navbar-logo">
                <!-- Formulario de búsqueda -->
                <form class="d-flex search-form mx-2 flex-grow-1" role="search">
                    <input class="form-control rounded-border" type="search" placeholder="Search" aria-label="Search" name="search">
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
    <!-- Filtros -->
    <div>
        <form method="GET" action="{{ route('events') }}">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="card custom-card">
                                <div class="card-body d-flex">
                                    <label for="horario" class="filtros">Horario</label>
                                    <input type="time" id="horario" name="horario" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card custom-card">
                                <div class="card-body d-flex">
                                    <label for="precio" class="filtros">Precio</label>
                                    <input type="number" id="precio" name="precio" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card custom-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <label for="ubicacion" class="filtros">Ubicación</label>
                                    <input type="text" id="ubicacion" name="ubicacion" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="card custom-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <label for="categoria" class="filtros">Categoría</label>
                                    <select id="categoria" name="categoria" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="arte">Arte</option>
                                        <option value="musica">Música</option>
                                        <option value="gastronomia">Gastronomía</option>
                                        <!-- Añadir más categorías según sea necesario -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card custom-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <label for="recientes" class="filtros">Recientes</label>
                                    <input type="checkbox" id="recientes" name="recientes" class="form-check-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Aplicar filtros</button>
        </form>
    </div>

    <!-- Eventos -->
    <div>
        @foreach($eventos as $evento)
        <div class="destacados">
            <a href="{{ route('event', $evento->evento_id) }}">
                <div class="card text-bg-dark">
                    <div class="card-overlay">
                        <img src="{{ $evento->imagen }}" class="card-img" alt="{{ $evento->titulo }}">
                    </div>
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title d-flex align-items-center">
                            {{ $evento->titulo }}
                            <img src="img/eventos/heart.svg" alt="heart icon" class="ms-5">
                        </h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <br>
    <br>
    <x-nav></x-nav>

</div>


@endsection