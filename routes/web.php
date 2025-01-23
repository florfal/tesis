<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/eventos', [EventoController::class, 'index'])->name('events'); // Utilizando EventoController
Route::get('/evento/{id}', [HomeController::class, 'event'])->name('event');
Route::get('/destacados', [HomeController::class, 'destacados'])->name('destacados');
Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::get('/form', [HomeController::class, 'form'])->name('form');
Route::get('/novedades', [EventoController::class, 'novedades'])->name('novedades');
Route::get('/mapa', [HomeController::class, 'mapa'])->name('mapa');

// Rutas para autenticación
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Ruta para el dashboard después de iniciar sesión
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para la vista de usuario (perfil del usuario)
Route::middleware('auth')->get('/user/profile', function () {
    return view('user'); // Aquí se mostrará tu vista user.blade.php
})->name('user.profile');

// Incluir las rutas generadas por Laravel Breeze para autenticación
require __DIR__.'/auth.php';
