@extends('layouts.main')

@section('title', 'Pagina de Novedades')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventos</title>
  <!-- Enlace a Bootstrap CSS -->

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
    /* Colores neón moderados */

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

</style>

</head>
<body>
  <div class="container">
    <!-- Buscador -->
    <div class="navbar-container">
    <nav class="navbar">
        <!-- Logo -->
        <img src="img/logonegro.png" alt="Logo">

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
              <img src="img/nav/magnifying-glass.svg" alt="Buscar">
            </button>
        </form>

        <!-- Logo de usuario -->
        <a href="{{ route('user') }}" class="user-link">
            <img src="img/user/oso.jpg" alt="Usuario" class="user_profile">
        </a>
    </nav>
</div>


    <!-- Tabs -->
    <div class="d-flex justify-content-center my-3">
      <div id="tabEventos" class="nav-tab mx-3 active">Calendario</div>
    </div>

    <!-- Sección de eventos -->
    <div class="events-section" id="eventsSection">
      <!-- Eventos dinámicos aquí -->
    </div>
  </div>
  <br>
<br>
  <x-nav></x-nav>

  <!-- Enlace a Bootstrap JS -->
  <script>
    // Datos iniciales de los eventos
    const events = [
        { date: '2024-12-7', name: 'Cerámica y Vino', image: 'img/prox_eventos/ceramica_vino.jpg' },
        { date: '2024-12-10', name: 'Joyería y Piedras', image: 'img/prox_eventos/joyeria.jpg' },
        { date: '2024-12-22', name: 'Cena de velas', image: 'img/prox_eventos/cena_vela.jpg' },
        { date: '2024-12-7', name: 'Primeros pasos Cocinando', image: 'img/prox_eventos/cocina.jpg' },
        { date: '2024-12-27', name: 'Fogón', image: 'img/destacados/fogon.jpg' },
        { date: '2024-12-26', name: 'Concierto de Rock', image: 'img/novedades/rock.jpg' },
        { date: '2024-12-26', name: 'Exposición de Arte', image: 'img/novedades/exposicion_arte.jpg' },
        { date: '2024-12-27', name: 'Feria de Tecnología', image: 'img/novedades/feria_tecno.jpg' },
        { date: '2024-12-28', name: 'Fiesta Navideña', image: 'img/novedades/navidad.jpg' },
        { date: '2024-12-28', name: 'Show en vivo', image: 'img/prox_eventos/show.jpg' },
    ];

    // Agrupar eventos por fecha
    function groupEventsByDate(events) {
      return events.reduce((grouped, event) => {
        const date = event.date;
        if (!grouped[date]) grouped[date] = [];
        grouped[date].push(event);
        return grouped;
      }, {});
    }

// Función para obtener un color de borde cíclico
function getBorderColor(index) {
  const borderColors = ['#A8C57B', '#B99BC9', '#F4A07C']; // Colores: verde, violeta, naranja
  return borderColors[index % borderColors.length]; // Aplica los colores en ciclo
}

// Renderizar los eventos
function renderEvents(events) {
  const groupedEvents = groupEventsByDate(events);
  const eventsSection = document.getElementById('eventsSection');
  eventsSection.innerHTML = '';

  let index = 0; // Para cambiar cíclicamente el color de borde

  for (const date in groupedEvents) {
    const dateTitle = document.createElement('div');
    dateTitle.className = 'date-title';
    dateTitle.innerText = new Date(date).toLocaleDateString('es-ES', {
      day: 'numeric',
      month: 'long',
      year: 'numeric',
    });
    eventsSection.appendChild(dateTitle);

    groupedEvents[date].forEach(event => {
      const eventElement = document.createElement('div');
      eventElement.className = 'event';
      
      // Asigna un borde cíclico
      eventElement.style.borderColor = getBorderColor(index);

      eventElement.innerHTML = `
        <img src="${event.image}" alt="${event.name}" class="rounded">
        <div class="event-name ms-2">${event.name}</div>
      `;
      eventsSection.appendChild(eventElement);

      index++; // Incrementa el índice para la siguiente tarjeta
    });
  }
}


    // Filtrar eventos por día
    function filterEvents() {
      const searchInput = document.getElementById('searchInput').value;
      const filteredEvents = events.filter(event => {
        const eventDay = new Date(event.date).getDate();
        return eventDay == searchInput;
      });
      renderEvents(filteredEvents.length ? filteredEvents : events);
    }

    // Render inicial
    renderEvents(events);
  </script>
</body>
</html>

@endsection