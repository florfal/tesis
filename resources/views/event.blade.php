@extends('layouts.main')

@section('title', $evento->titulo)

@section('content')
<div>
    <div>
        <a href="{{ route('events') }}">
            <div class="back-button">&#8592;</div>  
        </a>
        <div class="image-container">
            <img src="{{ asset($evento->imagen) }}" alt="{{ $evento->titulo }}" class="card-image">
        </div>

        <div class="event-details">
            <h3 class="">{{ $evento->titulo }}</h3>
            <p class="text-black"><span class="location-icon">📍</span>{{ $evento->ubicacion }}</p>
            <div class="separator"></div>

            <!-- Sección Acerca del Evento -->
            <div class="section">
                <h4 class="text-black">Acerca del evento</h4>
                <p class="text-black">{{ $evento->descripcion }}</p>
            </div>

            <!-- Sección Horarios -->
            <div class="section">
                <h4 class="text-black">Horarios</h4>
                <p class="text-black"><strong>Días:</strong> {{ $evento->dia_evento }}</p>
                <p class="text-black"><strong>Hora:</strong> {{ $evento->hora_inicio }} - {{ $evento->hora_fin }}</p>
            </div>

            <!-- Sección Precio -->
            <div class="section">
                <h4 class="text-black">Precio</h4>
                <p class="text-black"><strong>Costo:</strong> ${{ $evento->precio }} por persona</p>
                <p class="text-black"><small>{{ $evento->extra }}</small></p>
            </div>

            <div class="separator"></div>

            <!-- Sección Tickets -->
            <a href="#tickets-section" class="scroll-to-tickets-btn buy-button">Comprar ahora</a>
            <!-- Sección Tickets -->
            <div class="section" id="tickets-section">
                <h4 class="text-black">Tickets</h4>
            </div>

            <!-- Sección Ubicación -->
            <div class="section">
                <h4 class="text-black">Ubicación</h4>
                <div class="location-placeholder">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26279.126183125816!2d-58.44928536302975!3d-34.581630236127495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca81b4031cab%3A0xfd8ec5e1d0ce1fbf!2sPURAPALABRA%20Taller%20Literario%20para%20J%C3%B3venes%20y%20Adolescentes!5e0!3m2!1ses!2sar!4v1730221527175!5m2!1ses!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Sección Comentarios -->
            <div class="section">
                <h4 class="text-black">Comentarios</h4>
                <div class="comment-placeholder"></div>
                <div class="comment-placeholder"></div>
                <div class="comment-placeholder"></div>
                <div class="comment-placeholder"></div>
                <div class="comment-input">
                    <input type="text" placeholder="Escribe un comentario">
                    <button>&#10148;</button>
                </div>
            </div>
        </div>
        <button class="buy-button" style="margin: 15px;">Comprar ahora</button>
    </div>

    <script>
        // Esperar a que el DOM esté completamente cargado
        document.addEventListener("DOMContentLoaded", function() {
        const button = document.querySelector('.scroll-to-tickets-btn');
        const ticketsSection = document.getElementById('tickets-section');

        // Escuchar el evento de desplazamiento
        window.addEventListener('scroll', function() {
            const sectionPosition = ticketsSection.getBoundingClientRect();
            // Comprobar si la sección de Tickets está en la vista
            if (sectionPosition.top <= window.innerHeight && sectionPosition.bottom >= 0) {
                button.classList.add('hidden'); // Oculta el botón cuando está en la sección
            } else {
                button.classList.remove('hidden'); // Muestra el botón cuando no está en la sección
            }
        });
        });
    </script>
</div>
@endsection
