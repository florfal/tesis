<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController; // controlador en español para eventos listados, novedades, etc.
use App\Http\Controllers\EventController; // si existe para formas específicas (presencial/virtual)
use App\Http\Controllers\EventosController; // controlador que expone la API de ubicaciones
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('index');

// Eventos: listado y detalle
Route::get('/eventos', [EventoController::class, 'index'])->name('events');
Route::get('/evento/{id}', [HomeController::class, 'event'])->name('event'); // mantiene compatibilidad con la vista de evento individual

// Destacados, novedades y mapa
Route::get('/destacados', [HomeController::class, 'destacados'])->name('destacados');
Route::get('/novedades', function () {
    $groupedEvents = []; // reemplazar con lógica real si no se usa EventoController
    return view('novedades', compact('groupedEvents'));
})->name('novedades');
Route::get('/mapa', function () {
    return view('mapa');
})->name('mapa');

// Usuario / perfil
Route::get('/user', [UserController::class, 'index'])->name('user');

// Rutas de autenticación
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->middleware('guest');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil (mostrar / editar / actualizar / destruir)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para perfil del usuario (vista directa)
    Route::get('/user/profile', function () {
        return view('user');
    })->name('user.profile');
});

// Formularios específicos de eventos (presencial / virtual) si existen
Route::get('/form/presencial', [EventController::class, 'createPresencial'])->name('form.presencial');
Route::get('/form/virtual', [EventController::class, 'createVirtual'])->name('form.virtual');

// Incluir rutas de autenticación adicionales generadas por Breeze / Laravel
require __DIR__ . '/auth.php';

// API: ubicaciones de eventos
Route::get('/api/ubicaciones', [EventosController::class, 'ubicaciones']);
