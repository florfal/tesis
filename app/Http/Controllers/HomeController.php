<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index() { 
        $currentDate = Carbon::now(); $proximos_eventos = Evento::where('dia_evento', '>=', $currentDate) ->orderBy('dia_evento') ->take(5) ->get(); $destacados = Evento::inRandomOrder()->take(4)->get(); return view('index', compact('proximos_eventos', 'destacados')); 
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
