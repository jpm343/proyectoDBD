<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion::class, function (Faker $faker) {
    return [
    	'numero_habitacion' 		=> rand(0, 256),
    	'capacidad_habitacion'		=> rand(0, 20),
    	'precio_noche_habitacion'	=> rand(0, 500),
    	'tipo_habitacion'			=> $faker->text(150),
    ];
});
