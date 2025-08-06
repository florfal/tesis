<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile overview.
     */
    public function show(Request $request): View
    {
        $user = Auth::user()->fresh(); // Recargar desde BD

        // Cargar eventos creados y asistidos
        $createdEvents = $user->createdEvents ?? [];
        $attendingEvents = $user->attendingEvents ?? [];

        // Contadores
        $eventsCount = count($createdEvents) + count($attendingEvents);
        $followersCount = $user->followers()->count();
        $followingCount = $user->following()->count();

        // Combinar eventos para mostrar
        $events = collect($createdEvents)->merge($attendingEvents);

        return view('profile', [
            'user' => $user,
            'createdEvents' => $createdEvents,
            'attendingEvents' => $attendingEvents,
            'events' => $events,
            'eventsCount' => $eventsCount,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user()->fresh(); // Recargar desde BD

        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validación
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Actualizar nombre y email
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Actualizar contraseña si se proporciona
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Subir y guardar foto de perfil
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->media()->updateOrCreate(
                ['user_id' => $user->id, 'type' => 'avatar'],
                ['path' => $avatarPath]
            );
        }

        // Subir y guardar foto de portada
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $user->media()->updateOrCreate(
                ['user_id' => $user->id, 'type' => 'cover'],
                ['path' => $coverPath]
            );
        }

        // Guardar cambios
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Perfil actualizado correctamente.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}