<?php

use Faker\Generator as Faker;

$factory->define(App\Traslado::class, function (Faker $faker) {
    return [
        'fecha_traslado' 		=> '02/02/2012'
        'descripcion_traslado' 	=> text(1024),
        'origen_traslado'		=> text(256),
        'destino_traslado' 		=> text(256),
    ];
});
