<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
    	'puntuacion_hotel' 	=> random_float(1, 2), 
    	'descripcion_hotel' => text(1024), 
    	'direccion_hotel' 	=> text(125),
    	'ciudad_hotel' 		=> text(256),
    ];
});
