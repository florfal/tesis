<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eventos')->insert([
            // [
            //    'evento_id' =>
            //    'titulo' =>
            //    'descripcion'=>
            //    'ubicacion' =>
            //    'dia' =>
            //    'mes' =>
            //    'dia_evento'=>
            //    'horario' =>
            //    'precio' =>
            //    'imagen' =>
            //    'extra' =>
               
            // ]
            [
                'evento_id' => 1,
                'titulo' => 'Cerámica y Vino',
                'descripcion'=> 'Únete a nosotros para una experiencia única en la que podrás explorar tu creatividad mientras disfrutas de una copa de vino. Este curso de cerámica es perfecto para relajarte, aprender técnicas básicas y crear tus propias piezas de arte en un ambiente amigable y acogedor.',
                'ubicacion' => 'Taller Obra, Palermo.',
                'dia' => 7,
                'mes' => 'Dic', //esto podria ser lo que ya estan los meses, lo mismo con el dia
                'dia_evento' => 'Sabados y Domingos',
                'horario' => '6:00 PM - 9:00 PM',
                'precio' => 30000,
                'imagen' => 'img/destacados/ceramica.jpg',
                'extra' => 'materiales y una copa de vino'
            ],
            [
                'evento_id' => 2,
                'titulo' => 'Joyería y Piedras',
            //    'descripcion'=>
                'ubicacion' => 'El Patio, Berazategui.',
                'dia' => 10,
                'mes' => 'Dic',
                'dia_evento'=> 'Lunes a Viernes',
                'horario' => '9:00 AM - 12:00 PM',
                'precio' => 35000,
                'imagen' => 'img/prox_eventos/joyeria.jpg',
                'extra' => 'materiales basicos para crear una joya'
            ],
            [
                'evento_id' => 3,
                'titulo' => 'Show en vivo',
            //    'descripcion'=>
            //    'ubicacion' =>
            //    'dia' =>
            //    'mes' =>
            //    'dia_evento'=>
            //    'horario' =>
            //    'precio' =>
            //    'imagen' =>
            //    'extra' =>
            ]
        ]);
    }
}
