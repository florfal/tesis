<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/eventos', [EventoController::class, 'index'])->name('events'); // Utilizando EventoController

Route::get('/evento/{id}', [HomeController::class, 'event'])->name('event');
Route::get('/destacados', [HomeController::class, 'destacados'])->name('destacados');
Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::get('/form', [HomeController::class, 'form'])->name('form');
Route::get('/novedades', [HomeController::class, 'novedades'])->name('novedades');
Route::get('/mapa', [HomeController::class, 'mapa'])->name('mapa');

