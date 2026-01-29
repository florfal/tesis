<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Mail\CompraConfirmada;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function create($id)
    {
        $evento = Evento::where('evento_id', $id)->firstOrFail();
        return view('checkout', compact('evento'));
    }

    public function store(Request $request, $id)
    {
        $evento = Evento::where('evento_id', $id)->firstOrFail();

        $validated = $request->validate([
            'nombre'   => ['required', 'string', 'max:80'],
            'email'    => ['required', 'email', 'max:120'],
            'telefono' => ['nullable', 'string', 'max:30'],
            'cantidad' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $precioUnitario = $evento->precio; // puede ser null o 0
        $total = is_null($precioUnitario)
        ? null
        : $precioUnitario * $validated['cantidad'];

        $compra = Compra::create([
            'evento_id'       => $evento->evento_id,
            'nombre'          => $validated['nombre'],
            'email'           => $validated['email'],
            'telefono'        => $validated['telefono'],
            'cantidad'        => $validated['cantidad'],
            'precio_unitario' => $precioUnitario,
            'total'           => $total,
            'estado'          => 'pendiente',
    ]);

        // ✅ enviar mail
    Mail::to($compra->email)->send(new CompraConfirmada($compra, $evento));


    return redirect()
        ->route('checkout', ['id' => $evento->evento_id])
        ->with('success', '¡Reserva registrada! Te vamos a contactar por email.');
    }

}
