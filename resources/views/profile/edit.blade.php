@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')
<div class="container mt-5">
    <h2>Editar Perfil</h2>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Nombre -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (deja vacío si no quieres cambiarla)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- Confirmar contraseña -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <!-- Foto de perfil -->
        <div class="mb-3">
            <label for="avatar" class="form-label">Foto de perfil</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
            @if(auth()->user()->avatar)
                <img src="{{ asset(auth()->user()->avatar) }}" alt="Foto actual" width="100" class="mt-2">
            @endif
        </div>

        <!-- Foto de portada -->
        <div class="mb-3">
            <label for="cover" class="form-label">Foto de portada</label>
            <input type="file" name="cover" id="cover" class="form-control">
            @if(file_exists(public_path(auth()->user()->cover)))
                <img src="{{ asset(auth()->user()->cover) }}" alt="Portada actual" width="100%" class="mt-2" style="max-height: 200px;">
            @endif
        </div>

        <!-- Botón de guardar -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

    <br>
    <x-nav />
</div>
@endsection