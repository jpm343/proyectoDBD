<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Traslado::class, function (Faker $faker) {
    return [
		'fecha_traslado' 		=> Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp()),
        'descripcion_traslado' 	=> $faker->text(150),
        'origen_traslado'		=> $faker->city(),
        'destino_traslado' 		=> $faker->city(),
        'cantidad_pasajeros'	=> rand(1, 50),
        'precio_traslado'		=> rand(0, 500000),
        'id_reserva'            => rand(1, 20),
    ];
});
