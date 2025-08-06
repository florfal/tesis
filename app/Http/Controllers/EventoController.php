<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $query = Evento::query();

        if ($request->filled('horario')) {
            $query->where('hora_inicio', '<=', $request->horario)
                  ->where('hora_fin', '>=', $request->horario);
        }

        if ($request->filled('precio')) {
            $query->where('precio', '<=', $request->precio);
        }

        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('recientes')) {
            $query->orderBy('created_at', 'desc');
        }

        $eventos = $query->get();

        return view('events', compact('eventos')); // Cambiado a 'events'
    }
    public function novedades()
    {
        $eventos = Evento::all()->groupBy(function ($evento) {
            return $evento->dia . ' ' . $evento->mes;
        });
    
        return view('novedades', [
            'groupedEvents' => $eventos,
        ]);
    }
    

}
