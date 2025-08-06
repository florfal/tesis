<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Usar la tabla 'eventos' en lugar de 'events'
    protected $table = 'eventos';

    // Usar 'evento_id' como clave primaria en lugar de 'id'
    protected $primaryKey = 'evento_id';

    // Desactivar si no usas timestamps
    public $timestamps = true;

    // Relación con el modelo User (creador del evento)
   // public function creator()
    //{
      //  return $this->belongsTo(User::class, 'creator_id');
    //}   
    public function createdEvents()
    {
        return $this->hasMany(Event::class, 'creator_id');
    }

    // Campos asignables masivamente
    protected $fillable = [
        'titulo', 
        'descripcion', 
        'ubicacion', 
        'dia', 
        'mes', 
        'dia_evento', 
        'hora_inicio', 
        'hora_fin', 
        'precio', 
        'imagen', 
        'extra', 
        'categoria'
    ];
}