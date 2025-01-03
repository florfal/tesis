@extends('layouts.main')

@section('title', 'Destacados')

@section('content')

<div>
    <!-- Busqueda -->
    <div class="navbar-container">
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <img src="img/logonegro.png" alt="Logo" class="navbar-logo">

                <!-- Formulario de búsqueda -->
                <form class="d-flex search-form mx-2 flex-grow-1" role="search">
                    <input class="form-control rounded-border" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn search-btn" type="submit">
                        <img src="img/nav/magnifying-glass.svg" alt="Search">
                    </button>
                </form>

                <!-- Perfil de usuario -->
                <a href="{{ route('user') }}">
                    <img src="img/user/oso.jpg" alt="User Profile" class="user_profile">
                </a>
            </div>
        </nav>
    </div>

    <!-- Filtros -->
    <div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="row text-center">
                    <!-- Destacados con fondo oscuro y borde -->
                    <div class="col-4">
                        <div class="card custom-card destacados-card">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <p class="filtros">Destacados <img src="img/eventos/time.svg" alt="Icono de Destacados" class="icon"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex">
                                <p class="filtros">Horario <img src="img/eventos/clock.svg" alt="Icono de Horario" class="icon"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex">
                                <p class="filtros">Precio <img src="img/eventos/price-tag.svg" alt="Icono de Precio" class="icon"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="row text-center">
                    <div class="col-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <p class="filtros">Categoría <img src="img/eventos/category.svg" alt="Icono de Categoría" class="icon"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <p class="filtros">Recientes <img src="img/eventos/recent.svg" alt="Icono de Recientes" class="icon"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card custom-card">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <p class="filtros">Ubicación <img src="img/eventos/location.svg" alt="Icono de Ubicación" class="icon"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Eventos -->
    <div>
        <div class="destacados">
            <a href="{{ route('event') }}">
               <div class="card text-bg-dark">
                <div class="card-overlay">
                    <img src="img/destacados/ceramica.jpg" class="card-img" alt="...">
                </div>
                    
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title d-flex align-items-center">
                            Cerámica Ritual by fina Dane
                            <img src="img/eventos/heart.svg" alt="heart icon"  class="ms-5">
                        </h5>
                    </div>
                </div> 
            </a>
            
        </div>
        <div class="destacados">
            <a href="{{ route('event') }}">
               <div class="card text-bg-dark">
                <div class="card-overlay">
                    <img src="img/destacados/fogon.jpg" class="card-img" alt="...">
                </div>
                    
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title d-flex align-items-center">
                            Fogón nocturno      
                            <img src="img/eventos/heart.svg" alt="heart icon"  class="heart">
                        </h5>
                    </div>
                </div> 
            </a>
            
        </div>
        <div class="destacados">
            <div class="card text-bg-dark">
                <div class="card-overlay">
                      <img src="img/destacados/movie.jpg" class="card-img" alt="...">  
                </div>
            
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title d-flex align-items-center">
                        Proyecciones al Viento by Cine Libre
                        <img src="img/eventos/heart.svg" alt="heart icon"  class="ms-5 ">
                    </h5>
                </div>
            </div>
        </div>
        <div class="destacados">
            <div class="card text-bg-dark">
                <div class="card-overlay">
                    <img src="img/destacados/cerveza.jpg" class="card-img" alt="...">  
                </div>
            
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title d-flex align-items-center">
                    Cata Salvaje by Maestros Cerveceros
                    <img src="img/eventos/heart.svg" alt="heart icon"  class="ms-5">
                    </h5>
                </div>
            </div>
        </div>
        <div class="destacados">
            <div class="card text-bg-dark">
                <div class="card-overlay">
                    <img src="img/destacados/taller_cocina.jpg" class="card-img" alt="...">   
                </div>
             
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title d-flex align-items-center">
                    Sabores Ancestrales by Culinaria Viva
                    <img src="img/eventos/heart.svg" alt="heart icon"  class="ms-5">
                    </h5>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <x-nav></x-nav>

</div>

@endsection