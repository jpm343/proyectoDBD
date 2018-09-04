<?php

use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {
	$min = $faker->numberBetween(0, 5);
	$max = $faker->numberBetween($min, 6);

	//arreglo que da un rango aleatorio de dias (enteros del 0 al 6)
	$a1 = range($min, $max);

    return [
        //
        'puntuacion_actividad' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5),
        'nombre_actividad' => $faker->text(10),
        'descripcion_actividad' => $faker->text(50),
        'ciudad_actividad' => $faker->city,
        'pais_actividad' => $faker->country,
        'dias_disponibles' => $a1,
        'hora_inicio' => $faker->time,
        'hora_fin' => $faker->time,
    ];
});
