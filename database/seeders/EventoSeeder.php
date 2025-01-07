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
            //    'dia' => sub tabla
            //    'mes' => sub tabla
            //    'dia_evento'=> sub tabla
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
                'descripcion'=> 'Un taller diseñado para aprender técnicas básicas de joyería y trabajar con piedras naturales. Ideal para quienes desean crear piezas únicas y personalizadas.',
                'ubicacion' => 'El Patio, Berazategui.',
                'dia' => 10,
                'mes' => 'Dic',
                'dia_evento'=> 'Lunes a Viernes',
                'horario' => '9:00 AM - 12:00 PM',
                'precio' => 35000,
                'imagen' => 'img/prox_eventos/joyeria.jpg',
                'extra' => 'materiales básicos para crear una joya'
            ],
            [
                'evento_id' => 3,
                'titulo' => 'Show en vivo',
                'descripcion'=> 'Una experiencia musical al aire libre donde podrás disfrutar de un espectáculo vibrante en un entorno único.',
                'ubicacion' => 'Hipódromo de Palermo',
                'dia' => 12,
                'mes' => 'DIC',
                'dia_evento'=> 'Viernes',
                'horario' => '8:00 PM',
                'precio' => 10000,
                'imagen' => 'img/prox_eventos/show.jpg',
                'extra' => 'no incluye mantas. Incluye una comida'
            ],
            [
                'evento_id' => 4,
                'titulo' => 'Cena de velas',
                'descripcion'=> 'Disfruta de una velada íntima con una cena gourmet bajo la luz de las velas en un ambiente encantador.',
                'ubicacion' => 'Hortaleza, Caballito',
                'dia' => 22,
                'mes' => 'DIC',
                'dia_evento'=> 'Sábado',
                'horario' => '9:00 PM',
                'precio' => 50000,
                'imagen' => 'img/prox_eventos/cena_vela.jpg',
                'extra' => 'no incluye extras'
            ],
            [
                'evento_id' => 5,
                'titulo' => 'Primeros pasos Cocinando',
                'descripcion'=> 'Un curso introductorio para aprender a cocinar platos básicos y técnicas fundamentales en la cocina. Perfecto para principiantes.',
                'ubicacion' => 'IAG, Acassuso',
                'dia' => '7',
                'mes' => 'DIC',
                'dia_evento'=> 'Lunes, Martes y Jueves',
                'horario' => '2:00 PM - 5:00 PM',
                'precio' => 40000,
                'imagen' => 'img/prox_eventos/cocina.jpg',
                'extra' => 'materiales necesarios para las clases'
            ],
            [
                'evento_id' => 6,
                'titulo' => 'Fogón',
                'descripcion'=> 'Una noche mágica bajo las estrellas con música en vivo y la calidez del fuego. Una experiencia inolvidable para disfrutar con amigos o familia.',
                'ubicacion' => 'Necochea, Buenos Aires',
                'dia' => '27',
                'mes' => 'DIC',
                'dia_evento'=> 'Sábados',
                'horario' => '2:00 AM',
                'precio' => 0,
                'imagen' => 'img/destacados/fogon.jpg',
                'extra' => 'es necesario traer bebida y comida'
            ],
            [
                'evento_id' => 7,
                'titulo' => 'Cerámica Ritual by Fina Dane',
                'descripcion'=> 'Un taller exclusivo donde se fusiona la cerámica con prácticas rituales y meditativas. Ideal para quienes buscan un espacio de conexión y creación.',
                'ubicacion' => 'Estudio Creativo, San Telmo',
                'dia' => 14,
                'mes' => 'DIC',
                'dia_evento'=> 'Jueves y Viernes',
                'horario' => '5:00 PM - 8:00 PM',
                'precio' => 40000,
                'imagen' => 'img/destacados/ceramica.jpg',
                'extra' => 'incluye materiales y bebidas'
            ],
            [
                'evento_id' => 8,
                'titulo' => 'Sabores Ancestrales by Culinaria Viva',
                'descripcion'=> 'Descubre los secretos culinarios de nuestras raíces en un taller práctico donde explorarás recetas y técnicas ancestrales.',
                'ubicacion' => 'Centro Gastronómico, Belgrano',
                'dia' => 16,
                'mes' => 'DIC',
                'dia_evento'=> 'Miércoles',
                'horario' => '6:00 PM - 9:00 PM',
                'precio' => 45000,
                'imagen' => 'img/destacados/taller_cocina.jpg',
                'extra' => 'incluye ingredientes y recetario'
            ],
            [
                'evento_id' => 9,
                'titulo' => 'Cata Salvaje by Maestros Cerveceros',
                'descripcion'=> 'Experimenta la magia de las cervezas artesanales en una cata guiada por expertos cerveceros. Disfruta de sabores únicos.',
                'ubicacion' => 'Fábrica de Cerveza, Quilmes',
                'dia' => 20,
                'mes' => 'DIC',
                'dia_evento'=> 'Viernes',
                'horario' => '7:00 PM - 10:00 PM',
                'precio' => 25000,
                'imagen' => 'img/destacados/cerveza.jpg',
                'extra' => 'incluye degustación y un vaso de recuerdo'
            ],
            [
                'evento_id' => 10,
                'titulo' => 'Proyecciones al Viento by Cine Libre',
                'descripcion'=> 'Disfruta de una noche de cine al aire libre con una selección de películas independientes bajo las estrellas.',
                'ubicacion' => 'Parque Centenario, CABA',
                'dia' => 23,
                'mes' => 'DIC',
                'dia_evento'=> 'Sábado',
                'horario' => '9:00 PM',
                'precio' => 10000,
                'imagen' => 'img/destacados/movie.jpg',
                'extra' => 'llevar manta para mayor comodidad'
            ],
            [
                'evento_id' => 11,
                'titulo' => 'Puntadas del Alma by Hilos y Raíces',
                'descripcion'=> 'Un taller único para aprender técnicas de bordado tradicional con un enfoque en la expresión personal.',
                'ubicacion' => 'Espacio Creativo, Recoleta',
                'dia' => 15,
                'mes' => 'DIC',
                'dia_evento'=> 'Domingo',
                'horario' => '10:00 AM - 1:00 PM',
                'precio' => 20000,
                'imagen' => 'img/eventos/heart.svg',
                'extra' => 'incluye hilos y lienzos'
            ],
            [
                'evento_id' => 12,
                'titulo' => 'Concierto de Rock',
                'descripcion'=> 'Una noche electrizante con las mejores bandas locales e internacionales de rock.',
                'ubicacion' => 'Teatro Gran Rex, CABA',
                'dia' => 30,
                'mes' => 'DIC',
                'dia_evento'=> 'Sábado',
                'horario' => '8:00 PM',
                'precio' => 60000,
                'imagen' => 'img/novedades/rock.jpg',
                'extra' => 'entrada incluye bebida'
            ],
            [
                'evento_id' => 13,
                'titulo' => 'Exposición de Arte',
                'descripcion'=> 'Una muestra exclusiva con obras de artistas emergentes e innovadores.',
                'ubicacion' => 'Museo de Arte Moderno, CABA',
                'dia' => 28,
                'mes' => 'DIC',
                'dia_evento'=> 'Jueves',
                'horario' => '10:00 AM - 7:00 PM',
                'precio' => 15000,
                'imagen' => 'img/novedades/exposicion_arte.jpg',
                'extra' => 'incluye guía interactiva'
            ],
            [
                'evento_id' => 14,
                'titulo' => 'Feria de Tecnología',
                'descripcion'=> 'Explora las últimas innovaciones en tecnología y descubre productos de vanguardia.',
                'ubicacion' => 'Centro de Convenciones, CABA',
                'dia' => 18,
                'mes' => 'DIC',
                'dia_evento'=> 'Lunes y Martes',
                'horario' => '9:00 AM - 6:00 PM',
                'precio' => 50000,
                'imagen' => 'img/novedades/feria_tecno.jpg',
                'extra' => 'incluye material de exposición'
            ],
            [
                'evento_id' => 15,
                'titulo' => 'Fiesta Navideña',
                'descripcion'=> 'Celebra la magia de la Navidad con música en vivo, baile y sorpresas.',
                'ubicacion' => 'Club Social, Belgrano',
                'dia' => 24,
                'mes' => 'DIC',
                'dia_evento'=> 'Domingo',
                'horario' => '8:00 PM',
                'precio' => 40000,
                'imagen' => 'img/novedades/navidad.jpg',
                'extra' => 'incluye cena navideña'
            ],
            [
                'evento_id' => 16,
                'titulo' => 'Show en vivo',
                'descripcion'=> 'Un espectáculo inolvidable con música y performances en vivo.',
                'ubicacion' => 'Auditorio Luna Park, CABA',
                'dia' => 31,
                'mes' => 'DIC',
                'dia_evento'=> 'Domingo',
                'horario' => '10:00 PM',
                'precio' => 70000,
                'imagen' => 'img/prox_eventos/show.jpg',
                'extra' => 'incluye brindis de fin de año'
            ]
        ]);
    }
}
