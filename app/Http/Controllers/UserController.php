<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('profile'); // O cualquier otra vista que muestre el perfil del usuario
    }
}