<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $query = Evento::query();

        // HORARIO (incluye cruces de medianoche)
        if ($request->filled('horario')) {
            $h = $request->horario;

            $query->where(function ($q) use ($h) {

                // Caso normal
                $q->where(function ($q1) use ($h) {
                    $q1->whereColumn('hora_inicio', '<=', 'hora_fin')
                       ->whereTime('hora_inicio', '<=', $h)
                       ->whereTime('hora_fin', '>=', $h);
                })

                // Caso cruza medianoche
                ->orWhere(function ($q2) use ($h) {
                    $q2->whereColumn('hora_inicio', '>', 'hora_fin')
                       ->where(function ($q3) use ($h) {
                           $q3->whereTime('hora_inicio', '<=', $h)
                              ->orWhereTime('hora_fin', '>=', $h);
                       });
                });
            });
        }

        // PRECIO (rango)
        $min = $request->input('precio_min');
        $max = $request->input('precio_max');

        if ($min !== null && $min !== '') {
            $query->where('precio', '>=', (float)$min);
        }
        if ($max !== null && $max !== '') {
            $query->where('precio', '<=', (float)$max);
        }

        // UBICACION
        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        // CATEGORIA (robusta)
        if ($request->filled('categoria')) {
            $cat = mb_strtolower(trim($request->categoria));
            $query->whereRaw('LOWER(TRIM(categoria)) = ?', [$cat]);
        }

        // RECIENTES
        if ($request->boolean('recientes')) {
            $query->orderByDesc('created_at');
        } else {
            $query->orderByDesc('created_at');
        }

        $eventos = $query->get();

        return view('events', compact('eventos'));
    }

    public function novedades()
    {
        $eventos = \App\Models\Evento::all()->groupBy(function ($evento) {
            return $evento->dia . ' ' . $evento->mes;
        });

        return view('novedades', [
            'groupedEvents' => $eventos,
        ]);
    }
}
