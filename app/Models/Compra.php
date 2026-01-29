<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'evento_id',
        'nombre',
        'email',
        'telefono',
        'cantidad',
        'precio_unitario',
        'total',
        'estado',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id', 'evento_id');
    }
}
