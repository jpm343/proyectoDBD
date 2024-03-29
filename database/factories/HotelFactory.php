<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
    	'nombre_hotel'		=> $faker->text(10),
    	'puntuacion_hotel' 	=> rand(1, 2), 
    	'descripcion_hotel' => $faker->text(150), 
    	'direccion_hotel' 	=> $faker->text(150),
    	'ciudad_hotel' 		=> $faker->word(),
    ];
});
