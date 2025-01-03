<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])
    ->name('index');

Route::get('/eventos', [\App\Http\Controllers\HomeController::class, "events"])
    ->name('events');

Route::get('/evento', [\App\Http\Controllers\HomeController::class, "event"])
    ->name('event');

Route::get('/destacados', [\App\Http\Controllers\HomeController::class, "destacados"])
    ->name('destacados');

Route::get('/usuario', [\App\Http\Controllers\HomeController::class, "user"])
    ->name('user');

Route::get('/formulario', [\App\Http\Controllers\HomeController::class, "form"])
    ->name('form');

Route::get('/novedades', [\App\Http\Controllers\HomeController::class, "novedades"])
    ->name('novedades');

Route::get('/mapa', [\App\Http\Controllers\HomeController::class, "mapa"])
    ->name('mapa');
