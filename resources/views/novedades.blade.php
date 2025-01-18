@extends('layouts.main')

@section('title', 'Pagina de Novedades')

@section('content')
<div class="container">
    <!-- Buscador -->
    <div class="navbar-container">
        <nav class="navbar">
            <!-- Logo -->
            <img src="{{ asset('img/logonegro.png') }}" alt="Logo">

            <!-- Formulario de búsqueda -->
            <form class="d-flex search-form" onsubmit="filterEvents(); return false;" role="search">
                <input 
                  class="form-control rounded-border" 
                  type="number" 
                  id="searchInput" 
                  placeholder="Buscar día del evento" 
                  aria-label="Search">
                <button 
                  class="btn search-btn" 
                  type="button" 
                  onclick="filterEvents()">
                  <img src="{{ asset('img/nav/magnifying-glass.svg') }}" alt="Buscar">
                </button>
            </form>

            <!-- Logo de usuario -->
            <a href="{{ route('user') }}" class="user-link">
                <img src="{{ asset('img/user/oso.jpg') }}" alt="Usuario" class="user_profile">
            </a>
        </nav>
    </div>

    <!-- Tabs -->
    <div class="d-flex justify-content-center my-3">
        <div id="tabEventos" class="nav-tab mx-3 active">Calendario</div>
    </div>

    <!-- Sección de eventos -->
    <div class="events-section" id="eventsSection">
        @foreach ($groupedEvents as $date => $events)
            <div class="date-title">
                {{ ucfirst($events[0]->dia) }} {{ ucfirst($events[0]->mes) }}
            </div>
            @foreach ($events as $event)
                <div class="event" style="border-color: #A8C57B;">
                    <img src="{{ asset($event->imagen) }}" alt="{{ $event->titulo }}" class="rounded">
                    <div class="event-name ms-2">{{ $event->titulo }}</div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
<br>
<br>
<x-nav></x-nav>

<script>
    // Datos iniciales pasados desde Laravel
    const events = @json($groupedEvents);

    function renderEvents(groupedEvents) {
        const eventsSection = document.getElementById('eventsSection');
        eventsSection.innerHTML = '';

        Object.keys(groupedEvents).forEach((key, index) => {
            const dateGroup = groupedEvents[key];

            // Agregar título de fecha
            const dateTitle = document.createElement('div');
            dateTitle.className = 'date-title';
            dateTitle.innerText = `${dateGroup[0].dia} ${dateGroup[0].mes}`;
            eventsSection.appendChild(dateTitle);

            // Agregar eventos de esa fecha
            dateGroup.forEach(event => {
                const eventElement = document.createElement('div');
                eventElement.className = 'event';

                // Ciclar los colores del borde
                const borderColor = ['#A8C57B', '#B99BC9', '#F4A07C'][index % 3];
                eventElement.style.borderColor = borderColor;

                eventElement.innerHTML = `
                    <img src="${event.imagen}" alt="${event.titulo}" class="rounded">
                    <div class="event-name ms-2">${event.titulo}</div>
                `;
                eventsSection.appendChild(eventElement);
            });
        });
    }

    function filterEvents() {
        const searchInput = document.getElementById('searchInput').value;
        const filteredEvents = {};

        // Filtrar los eventos por día
        Object.keys(events).forEach(key => {
            const filteredGroup = events[key].filter(event => event.dia == searchInput);
            if (filteredGroup.length) {
                filteredEvents[key] = filteredGroup;
            }
        });

        // Renderizar los eventos filtrados
        renderEvents(Object.keys(filteredEvents).length ? filteredEvents : events);
    }

    // Render inicial
    renderEvents(events);
</script>

<!-- Estilos -->
<style>
    .event {
        display: flex;
        align-items: center;
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 10px;
        border: 2px solid; /* Borde más delgado */
    }
    .event img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px; /* Opcional: bordes redondeados */
    }

    .navbar-container {
        padding: 10px 16px; /* Ajuste del padding para móvil */
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between; /* Distribuir espacio entre los elementos */
    }

    .navbar img {
        max-height: 40px; /* Ajuste para que el logo sea pequeño */
        flex-shrink: 0; /* Evitar que se reduzca */
    }

    .search-form {
        display: flex;
        align-items: center;
        flex-grow: 1; /* Hacer que el formulario ocupe el espacio disponible */
        max-width: 220px; /* Limitar el ancho máximo del formulario */
        margin: 0 8px; /* Espaciado entre logo y perfil */
    }

    .search-form input {
        width: 100%; /* Que ocupe todo el ancho disponible */
        padding: 5px 10px;
        border: none;
        outline: none;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        font-size: 14px;
    }

    .search-btn {
        margin-left: 8px; /* Separar el botón del input */
        background: transparent;
        border: none;
    }

    .search-btn img {
        width: 20px;
        height: 20px;
    }

    .user-link {
        flex-shrink: 0; /* Evitar que el perfil se reduzca */
    }

    .user_profile {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .date-title {
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 10px;
        font-size: 18px;
    }
</style>
@endsection
