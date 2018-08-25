<?php

use Faker\Generator as Faker;

$factory->define(App\Traslado::class, function (Faker $faker) {
    return [
        'fecha_traslado' 		=> '02/02/2012',
        'descripcion_traslado' 	=> $faker->text(150),
        'origen_traslado'		=> $faker->text(150),
        'destino_traslado' 		=> $faker->text(150),
        'precio_traslado'		=> rand(0, 500),
        'id_reserva'            => rand(1, 20),
    ];
});
