<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    // Página /eventos (blade) con filtros
    public function index(Request $request)
    {
        $query = Evento::query();

        // SEARCH (titulo + descripcion + ubicacion + categoria)
        if ($request->filled('search')) {
            $term = trim($request->input('search'));

            $query->where(function ($q) use ($term) {
                $q->where('titulo', 'like', "%{$term}%")
                  ->orWhere('descripcion', 'like', "%{$term}%")
                  ->orWhere('ubicacion', 'like', "%{$term}%")
                  ->orWhere('categoria', 'like', "%{$term}%");
            });
        }

        // HORARIO (incluye cruces de medianoche)
        if ($request->filled('horario')) {
            $h = $request->horario;

            $query->where(function ($q) use ($h) {

                // Caso normal (no cruza medianoche)
                $q->where(function ($q1) use ($h) {
                    $q1->whereColumn('hora_inicio', '<=', 'hora_fin')
                       ->whereTime('hora_inicio', '<=', $h)
                       ->whereTime('hora_fin', '>=', $h);
                })

                // Caso cruza medianoche (ej: 20:00 a 00:00)
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
            $query->whereNotNull('precio')->where('precio', '>=', (float)$min);
        }
        if ($max !== null && $max !== '') {
            $query->whereNotNull('precio')->where('precio', '<=', (float)$max);
        }

        // UBICACION (extra, por si querés usar el input ubicacion además del search)
        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', 'like', '%' . $request->ubicacion . '%');
        }

        // CATEGORIA (robusta)
        if ($request->filled('categoria')) {
            $cat = mb_strtolower(trim($request->categoria));
            $query->whereRaw('LOWER(TRIM(categoria)) = ?', [$cat]);
        }

        // RECIENTES
        $query->orderByDesc('created_at');

        $eventos = $query->get();

        return view('events', compact('eventos'));
    }

    // Endpoint JSON para el mapa
    public function ubicaciones()
    {
        try {
            $ubicaciones = Evento::select(
                'titulo as nombre',
                'descripcion',
                'ubicacion as direccion',
                'lat',
                'lng'
            )
            ->whereNotNull('lat')
            ->whereNotNull('lng')
            ->get();

            return response()->json($ubicaciones);
        } catch (\Exception $e) {
            return response()->json(
                ['error' => 'Error al cargar ubicaciones: ' . $e->getMessage()],
                500
            );
        }
    }
}
