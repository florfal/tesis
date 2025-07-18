<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;


Route::get('/mapa', function () {
    return view('mapa');
})->name('mapa');

Route::get('/novedades', function () {
    // Aquí puedes pasar datos dinámicos más adelante
    $groupedEvents = []; // Reemplaza con datos reales cuando tengas modelo

    return view('novedades', compact('groupedEvents'));
})->name('novedades');

Route::get('/event/{id}', function ($id) {
    // Aquí cargarías los datos del evento desde la base de datos
    $evento = \App\Models\Event::findOrFail($id);

    return view('event', compact('evento'));
})->name('event');

Route::get('/events', function () {
    // Aquí puedes pasar datos dinámicos más adelante
    $eventos = []; // Reemplaza con datos reales cuando tengas modelo
    return view('events', compact('eventos'));
})->name('events');


// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('index');

// Dashboard (opcional)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Registro de usuarios
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Perfil del usuario (vista personalizada)
Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

// Edición del perfil (métodos edit/update/destroy)
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Otras rutas
Route::get('/user', [UserController::class, 'index'])->name('user');

// Formularios para crear eventos
Route::get('/form/presencial', [EventController::class, 'createPresencial'])->name('form.presencial');
Route::get('/form/virtual', [EventController::class, 'createVirtual'])->name('form.virtual');

require __DIR__.'/auth.php';