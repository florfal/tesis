@extends('layouts.main')

@section('title', 'Usuario')

@section('content')

<div>
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
                <img src="img/user/oso.jpg" alt="Foto de perfil" class="img-fluid">
            </div>
            <div>
                <h5 class="text-center">osito_cariñosito</h5>
            </div>
            <div class="profile-stats d-flex justify-content-around">
                <div class="stat text-center">
                    <p class="number">3</p>
                    <p class="label">Eventos</p>
                </div>
                <div class="stat text-center">
                    <p class="number">26</p>
                    <p class="label">Seguidores</p>
                </div>
                <div class="stat text-center">
                    <p class="number">23</p>
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
            <!-- tarjetas eventos -->
            <div class="col-6 mb-4">
                <div class="card event-card">
                    <div class="event-image">
                        <img src="img/user/ceramica.JPG" alt="Evento 1" class="card-img-top">
                        <div class="event-title">Cerámica</div>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card event-card">
                    <div class="event-image">
                        <img src="img/user/joyeria.JPG" alt="Evento 2" class="card-img-top">
                        <div class="event-title">Joyería</div>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card event-card">
                    <div class="event-image">
                        <img src="img/user/lienzo.JPG" alt="Evento 3" class="card-img-top">
                        <div class="event-title">Arte sobre Lienzo</div>
                    </div>
                </div>
            </div>
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

</div>

@endsection