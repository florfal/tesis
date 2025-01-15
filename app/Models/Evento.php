<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $primaryKey = 'evento_id';

    protected $fillable = [
        'titulo',
        'descripcion',
        'ubicacion',
        'dia',
        'mes',
        'dia_evento',
        'horario',
        'precio',
        'image',
        'extra',
        'categoria',
    ];
}

