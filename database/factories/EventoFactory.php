<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>id('evento_id'),
            'titulo'=>string('titulo'),
            'descricion'=>longText('descripcion'),
            'ubicacion'=>string('ubicacion'),
            'dia'=>decimal('dia'),
            'mes'=>string('mes'),
            'dia_evento'=>string('dia_evento'),
            'hora_inicio' => $hora_inicio, 
            'hora_fin' => $hora_fin,
            'precio'=>decimal('precio'),
            'image'=>string('imagen')->nullable(),
            'extra'=>string('extra'),
            'categoria'=>string('categoria'),
        ];
    }
}
