@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<div>

<form method="GET" action="{{ route('events') }}">

    <!-- Navbar + búsqueda + botón filtros -->
    <div class="navbar-container">
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <img src="img/logonegro.png" alt="Logo" class="navbar-logo">

                <!-- Search -->
                <div class="d-flex search-form mx-2 flex-grow-1" role="search">
                    <input
                        class="form-control rounded-border"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                        name="search"
                        value="{{ request('search') }}"
                    >
                    <button class="btn search-btn" type="submit">
                        <img src="img/nav/magnifying-glass.svg" alt="Search">
                    </button>
                </div>

                <!-- Botón filtros (hamburguesa) -->
                <button
                    type="button"
                    class="btn btn-outline-secondary me-2"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#filtersOffcanvas"
                    aria-controls="filtersOffcanvas"
                    aria-label="Abrir filtros"
                    style="border-radius: 999px;"
                >
                    &#9776;
                </button>

                <!-- Perfil -->
                <a href="{{ route('user') }}">
                    <img src="img/user/oso.jpg" alt="User Profile" class="user_profile">
                </a>
            </div>
        </nav>
    </div>

    <!-- Offcanvas filtros -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filtersOffcanvas" aria-labelledby="filtersOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filtersOffcanvasLabel">Filtros</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>

        <div class="offcanvas-body">

            <!-- HORARIO -->
            <div class="mb-4">
                <label for="horario" class="form-label">Horario</label>
                <input
                    type="time"
                    id="horario"
                    name="horario"
                    class="form-control"
                    value="{{ request('horario') }}"
                >
            </div>

            <!-- PRECIO RANGO -->
            @php
                $precioMin = request('precio_min', 0);
                $precioMax = request('precio_max', 80000);

                if (is_numeric($precioMin) && is_numeric($precioMax) && $precioMin > $precioMax) {
                    $tmp = $precioMin;
                    $precioMin = $precioMax;
                    $precioMax = $tmp;
                }
            @endphp

            <div class="mb-4">
                <label class="form-label">Filtrar por precio</label>

                <div class="p-3 rounded" style="background:#f2f2f2;">
                    <div class="mb-3">
                        <input
                            type="range"
                            id="precio_min"
                            name="precio_min"
                            min="0"
                            max="80000"
                            step="1000"
                            value="{{ $precioMin }}"
                            class="form-range"
                        >
                    </div>

                    <div class="mb-2">
                        <input
                            type="range"
                            id="precio_max"
                            name="precio_max"
                            min="0"
                            max="80000"
                            step="1000"
                            value="{{ $precioMax }}"
                            class="form-range"
                        >
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        <div class="text-muted">
                            Precio: <span id="precioMinLabel"></span> — <span id="precioMaxLabel"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UBICACION -->
            <div class="mb-4">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input
                    type="text"
                    id="ubicacion"
                    name="ubicacion"
                    class="form-control"
                    value="{{ request('ubicacion') }}"
                >
            </div>

            <!-- CATEGORIA -->
            <div class="mb-4">
                <label for="categoria" class="form-label">Categoría</label>
                <select id="categoria" name="categoria" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="Arte y Manualidades" {{ request('categoria') == 'Arte y Manualidades' ? 'selected' : '' }}>Arte y Manualidades</option>
                    <option value="Música y Espectáculos" {{ request('categoria') == 'Música y Espectáculos' ? 'selected' : '' }}>Música y Espectáculos</option>
                    <option value="Gastronomía" {{ request('categoria') == 'Gastronomía' ? 'selected' : '' }}>Gastronomía</option>
                    <option value="Educación y Talleres" {{ request('categoria') == 'Educación y Talleres' ? 'selected' : '' }}>Educación y Talleres</option>
                    <option value="Cine y Cultura" {{ request('categoria') == 'Cine y Cultura' ? 'selected' : '' }}>Cine y Cultura</option>
                    <option value="Tecnología e Innovación" {{ request('categoria') == 'Tecnología e Innovación' ? 'selected' : '' }}>Tecnología e Innovación</option>
                    <option value="Fiestas y Celebraciones" {{ request('categoria') == 'Fiestas y Celebraciones' ? 'selected' : '' }}>Fiestas y Celebraciones</option>
                    <option value="Naturaleza y Aventura" {{ request('categoria') == 'Naturaleza y Aventura' ? 'selected' : '' }}>Naturaleza y Aventura</option>
                </select>
            </div>

            <!-- RECIENTES -->
            <div class="mb-4 d-flex align-items-center">
                <input
                    type="checkbox"
                    id="recientes"
                    name="recientes"
                    class="form-check-input me-2"
                    {{ request()->boolean('recientes') ? 'checked' : '' }}
                >
                <label for="recientes" class="form-label mb-0">Recientes</label>
            </div>

            <!-- ACCIONES -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">Aplicar filtros</button>
                <a href="{{ route('events') }}" class="btn btn-outline-secondary w-100">Limpiar</a>
            </div>

        </div>
    </div>

</form>

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

<br><br>
<x-nav></x-nav>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const minEl = document.getElementById('precio_min');
    const maxEl = document.getElementById('precio_max');
    const minLabel = document.getElementById('precioMinLabel');
    const maxLabel = document.getElementById('precioMaxLabel');

    function format(n) {
        try { return '$' + Number(n).toLocaleString('es-AR'); }
        catch(e) { return '$' + n; }
    }

    function sync() {
        let min = Number(minEl.value);
        let max = Number(maxEl.value);

        if (min > max) {
            const tmp = min;
            min = max;
            max = tmp;
            minEl.value = min;
            maxEl.value = max;
        }

        minLabel.textContent = format(min);
        maxLabel.textContent = format(max);
    }

    minEl.addEventListener('input', sync);
    maxEl.addEventListener('input', sync);
    sync();
});
</script>

@endsection
