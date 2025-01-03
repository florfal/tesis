@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<div>

    <div>
        <a href="{{ route('events') }}">
            <div class="back-button">&#8592;</div>  
        </a>
        <div class="image-container">
            <img src="img/destacados/ceramica.jpg" alt="Evento de cerámica y vino" class="card-image">
        </div>

        <div class="event-details">
            <h3 class="">Cerámica y vino</h3>
            <p class="text-black"><span class="location-icon">📍</span>Taller Obra, Palermo.</p>
            <div class="separator"></div>

            <!-- Sección Acerca del Evento -->
            <div class="section">
                <h4 class="text-black">Acerca del evento</h4>
                <p class="text-black">Únete a nosotros para una experiencia única en la que podrás explorar tu creatividad mientras disfrutas de una copa de vino. Este curso de cerámica es perfecto para relajarte, aprender técnicas básicas y crear tus propias piezas de arte en un ambiente amigable y acogedor.</p>
            </div>

            <!-- Sección Horarios -->
            <div class="section">
                <h4 class="text-black">Horarios</h4>
                <p class="text-black"><strong>Días:</strong> Sábados y domingos</p>
                <p class="text-black"><strong>Hora:</strong> 6:00 PM - 9:00 PM</p>
            </div>

            <!-- Sección Precio -->
            <div class="section">
                <h4 class="text-black">Precio</h4>
                <p class="text-black"><strong>Costo:</strong> $5000 por persona</p>
                <p class="text-black"><small>Incluye materiales y una copa de vino</small></p>
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