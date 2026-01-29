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
            <h3>{{ $evento->titulo }}</h3>
            <p class="text-black">
                <span class="location-icon">📍</span>{{ $evento->ubicacion }}
            </p>

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

                @php
                    $hi = $evento->hora_inicio ? substr($evento->hora_inicio, 0, 5) : null;
                    $hf = $evento->hora_fin ? substr($evento->hora_fin, 0, 5) : null;
                @endphp

                <p class="text-black">
                    <strong>Hora:</strong>
                    {{ $hi ?? 'A confirmar' }} - {{ $hf ?? 'A confirmar' }}
                </p>
            </div>

            <!-- Sección Precio -->
            <div class="section">
                <h4 class="text-black">Precio</h4>

                @php
                    $precio = $evento->precio;
                @endphp

                <p class="text-black">
                    <strong>Costo:</strong>
                    @if(is_null($precio))
                        A confirmar
                    @elseif((int)$precio === 0)
                        Gratis
                    @else
                        ${{ number_format($precio, 0, ',', '.') }} por persona
                    @endif
                </p>

                @if(!empty($evento->extra))
                    <p class="text-black"><small>{{ $evento->extra }}</small></p>
                @endif
            </div>

            <div class="separator"></div>

            <!-- Comprar ahora (fijo / arriba) -->
            <a href="{{ route('checkout', ['id' => $evento->evento_id]) }}" class="buy-button">
                Comprar ahora
            </a>

            <!-- Sección Ubicación -->
            <div class="section">
                <h4 class="text-black">Ubicación</h4>

                <div class="location-placeholder">
                    @if(!is_null($evento->lat) && !is_null($evento->lng))
                        @php
                            $lat = $evento->lat;
                            $lng = $evento->lng;
                            $mapSrc = "https://www.google.com/maps?q={$lat},{$lng}&z=15&output=embed";
                        @endphp

                        <iframe
                            src="{{ $mapSrc }}"
                            width="400"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <p class="text-black">No hay coordenadas disponibles para este evento.</p>
                        <p class="text-black">Dirección: <strong>{{ $evento->ubicacion }}</strong></p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Comprar ahora (abajo) -->
        <a href="{{ route('checkout', ['id' => $evento->evento_id]) }}" class="buy-button" style="margin: 15px; display:inline-block;">
            Comprar ahora
        </a>
    </div>
</div>
@endsection
