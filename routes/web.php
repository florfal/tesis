<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventosController; // API ubicaciones
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CheckoutController;


// Página principal
Route::get('/', [HomeController::class, 'index'])->name('index');

//  Eventos: listado y detalle
Route::get('/eventos', [EventosController::class, 'index'])->name('events');

//  Ubicaciones (API)
Route::get('/api/ubicaciones', [EventosController::class, 'ubicaciones'])->name('ubicaciones');

// Detalle (como lo tenés)
Route::get('/evento/{id}', [HomeController::class, 'event'])->name('event');

Route::get('/checkout/{id}', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout/{id}', [CheckoutController::class, 'store'])->name('checkout.store');

// Destacados, novedades y mapa
Route::get('/destacados', [HomeController::class, 'destacados'])->name('destacados');

//  Novedades: usa tu controller real
Route::get('/novedades', [EventoController::class, 'novedades'])->name('novedades');

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
