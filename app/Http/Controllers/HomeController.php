<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{

    public function index(){
        return view('index');
    }
    
    public function events(){
        return view('events');
    }
    
    public function event(){
        return view('event');
    }

    public function destacados(){
        return view('destacados');
    }

    public function user(){
        return view('user');
    }

    public function form(){
        return view('form');
    }
    public function novedades(){
        return view('novedades');
    }
    public function mapa(){
        return view('mapa');
    }
}
