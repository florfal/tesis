@extends('layouts.main')

@section('title', 'Perfil del Usuario')

@section('content')
<div>
    @auth
        <a href="{{ route('index') }}">
            <div class="back-button">&#8592;</div>  
        </a>
        <!-- Mensajes flash -->
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
            <!-- Perfil -->
            <div class="profile-container">
                <div class="cover-photo">
                    <img src="{{ $user->cover ? asset($user->cover) : asset('img/user/mar.jpg') }}" alt="Foto de portada" class="img-fluid">
                </div>
                <div class="profile-photo">
                    <img src="{{ $user->avatar ? asset($user->avatar) : asset('img/user/oso.jpg') }}" alt="Foto de perfil" class="img-fluid">
                </div>
                <div>
                    <h5 class="text-center">{{ $user->name }}</h5>
                </div>
                <div class="settings-menu">
                    <button id="settings-button" class="settings-button">
                        ⚙️ Configuración
                    </button>

                    <div id="settings-dropdown" class="settings-dropdown" style="display: none;">
                        <ul>
                            <li>
                                <a href="{{ route('profile.edit') }}">Editar perfil</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
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


            <!-- Tabs dinámicos -->
            <div class="navigation-tabs d-flex justify-content-center mt-4">
                <div id="tabEventos" class="nav-tab mx-3 active">Mis eventos</div>
                <div id="tabCrearEventos" class="nav-tab mx-3">Crear eventos</div>
            </div>

            <!-- Sección de Mis eventos -->
            <div id="eventos" class="mt-4">

                <!-- Eventos creados -->
                <h5 class="mb-3">Tus eventos creados</h5>
                <div class="row">
                    @forelse ($createdEvents as $event)
                        <div class="col-6 mb-4">
                            <div class="card event-card">
                                <div class="event-image">
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="card-img-top">
                                    <div class="event-title">{{ $event->title }}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-4">No has creado ningún evento aún.</p>
                    @endforelse
                </div>

                <!-- Eventos a los que asiste -->
                <h5 class="my-3">Eventos a los que asistirás</h5>
                <div class="row">
                    @forelse ($attendingEvents as $event)
                        <div class="col-6 mb-4">
                            <div class="card event-card">
                                <div class="event-image">
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="card-img-top">
                                    <div class="event-title">{{ $event->title }}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-4">No estás anotado a ningún evento.</p>
                    @endforelse
                </div>

            </div>

            <!-- Sección de Crear eventos -->
            <div id="crearEventos" class="row mt-4" style="display: none;">
                <div class="col-12 mb-4">
                    <a href="{{ route('form.presencial') }}">
                        <div class="card create-event-card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Presencial</h5>
                                <p class="card-text">Organizá un evento al que las personas puedan asistir físicamente.</p>
                            </div>
                        </div>                    
                    </a>
                </div>

                <div class="col-12 mb-4">
                    <a href="{{ route('form.virtual') }}">
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

            // Cambiar a la vista "Mis eventos"
            tabEventos.addEventListener('click', () => {
                eventosSection.style.display = 'flex';
                crearEventosSection.style.display = 'none';
                tabEventos.classList.add('active');
                tabCrearEventos.classList.remove('active');
            });

            // Cambiar a la vista "Crear eventos"
            tabCrearEventos.addEventListener('click', () => {
                eventosSection.style.display = 'none';
                crearEventosSection.style.display = 'flex';
                tabCrearEventos.classList.add('active');
                tabEventos.classList.remove('active');
            });
            // Menú de configuración
            const settingsButton = document.getElementById('settings-button');
            const settingsDropdown = document.getElementById('settings-dropdown');

            if (settingsButton && settingsDropdown) {
                settingsButton.addEventListener('click', () => {
                    const currentDisplay = settingsDropdown.style.display;
                    settingsDropdown.style.display = currentDisplay === 'block' ? 'none' : 'block';
                });

                // Opcional: cerrar menú al hacer clic fuera
                document.addEventListener('click', function(event) {
                    if (!settingsDropdown.contains(event.target) && !settingsButton.contains(event.target)) {
                        settingsDropdown.style.display = 'none';
                    }
                });
            }
        </script>
    @else
        <div class="auth-options text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo de la App" class="mb-4">
            <p>Por favor, <a href="{{ route('login') }}" class="btn btn-primary mx-2">Inicia sesión</a> o <a href="{{ route('register') }}" class="btn btn-secondary mx-2">Regístrate</a> para ver tu perfil.</p>
        </div>
    @endauth
</div>
@endsection