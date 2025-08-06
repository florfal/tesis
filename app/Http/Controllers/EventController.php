<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createPresencial()
    {
        return view('events.create-presencial');
    }

    public function createVirtual()
    {
        return view('events.create-virtual');
    }
}
