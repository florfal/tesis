<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile overview.
     */
    public function show(Request $request): View
    {
        $user = $request->user();

        // Cargar eventos creados y a los que asiste
        $createdEvents = $user->createdEvents ?? [];
        $attendingEvents = $user->attendingEvents ?? [];

        // Contadores
        $eventsCount = count($createdEvents) + count($attendingEvents);
        $followersCount = $user->followers()->count();
        $followingCount = $user->following()->count();

        return view('profile', [
            'user' => $user,
            'createdEvents' => $createdEvents,
            'attendingEvents' => $attendingEvents,
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
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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