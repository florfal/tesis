@extends('layouts.main')

@section('title', 'Pagina de inicio')

@section('content')

<style>
    .card {
        border: 3px solid transparent;
        border-radius: 10px;
        border-top-left-radius: 18px;
        border-top-right-radius: 18px;
    }

    .carousel-item {
        transition: transform 0.5s ease-in-out;
    }
</style>

<!-- Busqueda -->
<div class="navbar-container">
    <nav class="navbar">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <img src="{{ asset('img/logonegro.png') }}" alt="Logo" class="navbar-logo">

            <!-- Search -->
            <form class="d-flex search-form mx-2 flex-grow-1" role="search" method="GET" action="{{ route('events') }}">
                <input
                    class="form-control rounded-border"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    name="search"
                    value="{{ request('search') }}"
                >

                @if(request('search'))
                    <a class="btn btn-light ms-2" href="{{ route('events') }}" aria-label="Limpiar búsqueda">
                        ✕
                    </a>
                @endif

                <button class="btn search-btn" type="submit">
                    <img src="{{ asset('img/nav/magnifying-glass.svg') }}" alt="Search">
                </button>
            </form>

            <!-- Perfil -->
            <a href="{{ route('user') }}">
                <img src="{{ asset('img/user/oso.jpg') }}" alt="User Profile" class="user_profile">
            </a>
        </div>
    </nav>
</div>

<!-- Próximos eventos -->
<div>
    <div class="header-container">
        <h1 class="header-title">Próximos eventos</h1>
        <a href="{{ route('events') }}" class="view-all-button">Ver todos <span class="arrow">➡️</span></a>
    </div>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($proximos_eventos->chunk(2) as $key => $eventoChunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($eventoChunk as $evento)
                            <div class="col-6">
                                <div class="card">
                                    <a href="{{ route('event', ['id' => $evento->evento_id]) }}">
                                        <img src="{{ asset($evento->imagen) }}" class="card-img-top card-image" alt="{{ $evento->titulo }}">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="event-date rounded text-center me-1 col-3">
                                                <span class="day d-block fw-bold">{{ $evento->dia }}</span>
                                                <span class="month d-block text-uppercase">{{ $evento->mes }}</span>
                                            </div>
                                            <div class="event-info">
                                                <h5 class="card-title mb-1">{{ $evento->titulo }}</h5>
                                                <p class="card-text text-muted">
                                                    <span class="location-icon">📍</span> {{ $evento->ubicacion }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
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
                <a href="{{ route('event', ['id' => $evento->evento_id]) }}">
                    <div class="card-overlay">
                        <img src="{{ asset($evento->imagen) }}" class="card-img" alt="{{ $evento->titulo }}">
                    </div>
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title d-flex align-items-center">
                            {{ $evento->titulo }}
                            <img src="{{ asset('img/eventos/heart.svg') }}" alt="heart icon" class="ms-5">
                        </h5>
                    </div>
                </a>
            </div>
            <br>
        @endforeach
    </div>
</div>

<x-nav></x-nav>

@push('scripts')
<script>
    const colors = ['#A8C57B', '#B99BC9', '#F4A07C'];
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.borderColor = colors[index % colors.length];
    });
</script>
@endpush

@endsection
