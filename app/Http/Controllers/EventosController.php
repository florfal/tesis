<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
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
            return response()->json(['error' => 'Error al cargar ubicaciones: ' . $e->getMessage()], 500);
        }
    }
}
