@extends('layouts.main')

@section('title', 'Usuario')

@section('content')
<div>
    @auth
        <a href="{{ route('index') }}">
            <div class="back-button">&#8592;</div>  
        </a>
        <div class="container">
            <!-- perfil -->
            <div class="profile-container">
                <div class="cover-photo">
                    <img src="img/user/mar.jpg" alt="Foto de portada" class="img-fluid">
                </div>
                <div class="profile-photo">
                    <img src="{{ auth()->user()->avatar ?? 'img/user/oso.jpg' }}" alt="Foto de perfil" class="img-fluid">
                </div>
                <div>
                    <h5 class="text-center">{{ auth()->user()->name }}</h5>
                </div>
                <div class="profile-stats d-flex justify-content-around">
                    <div class="stat text-center">
                        <p class="number">{{ $eventsCount ?? 0 }}</p>
                        <p class="label">Eventos</p>
                    </div>
                    <div class="stat text-center">
                        <p class="number">{{ $followersCount ?? 0 }}</p>
                        <p class="label">Seguidores</p>
                    </div>
                    <div class="stat text-center">
                        <p class="number">{{ $followingCount ?? 0 }}</p>
                        <p class="label">Seguidos</p>
                    </div>
                </div>
            </div>

            <!-- botones -->
            <div class="navigation-tabs d-flex justify-content-center mt-4">
                <div id="tabEventos" class="nav-tab mx-3 active">Eventos</div>
                <div id="tabCrearEventos" class="nav-tab mx-3">Crear Eventos</div>
            </div>

            <div id="eventos" class="row mt-4">
                <!-- tarjetas eventos dinámicas -->
                @forelse($events as $event)
                    <div class="col-6 mb-4">
                        <div class="card event-card">
                            <div class="event-image">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="card-img-top">
                                <div class="event-title">{{ $event->title }}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No tienes eventos creados.</p>
                @endforelse
            </div>

            <!-- crear eventos -->
            <div id="crearEventos" class="row mt-4" style="display: none;">
                <div class="col-12 mb-4">
                    <a href="{{route('form')}}">
                        <div class="card create-event-card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Presencial</h5>
                                <p class="card-text">Organizá un evento al que las personas puedan asistir físicamente.</p>
                            </div>
                        </div>                    
                    </a>
                </div>

                <div class="col-12 mb-4">
                    <a href="{{route('form')}}">
                        <div class="card create-event-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Virtual</h5>
                            <p class="card-text">Organizá un evento en línea que se pueda realizar de forma virtual.</p>
                        </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <x-nav></x-nav> 

        <script>
            const tabEventos = document.getElementById('tabEventos');
            const tabCrearEventos = document.getElementById('tabCrearEventos');
            const eventosSection = document.getElementById('eventos');
            const crearEventosSection = document.getElementById('crearEventos');

            // Cambiar a la vista "Eventos"
            tabEventos.addEventListener('click', () => {
                eventosSection.style.display = 'flex';
                crearEventosSection.style.display = 'none';
                tabEventos.classList.add('active');
                tabCrearEventos.classList.remove('active');
            });

            // Cambiar a la vista "Crear Eventos"
            tabCrearEventos.addEventListener('click', () => {
                eventosSection.style.display = 'none';
                crearEventosSection.style.display = 'flex';
                tabCrearEventos.classList.add('active');
                tabEventos.classList.remove('active');
            });
        </script>
    @else
        <div class="auth-options text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo de la App" class="mb-4">
            <p>Por favor, <a href="{{ route('login') }}" class="btn btn-primary mx-2">Inicia sesión</a> o <a href="{{ route('register') }}" class="btn btn-secondary mx-2">Regístrate</a> para ver tu perfil.</p>
        </div>
    @endauth
</div>
@endsection

