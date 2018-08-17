<?php

use Faker\Generator as Faker;

$factory->define(App\Actividad::class, function (Faker $faker) {
    return [
        //
        'puntuacion_actividad' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5),
        'nombre_actividad' => $faker->text(10),
        'descripcion_actividad' => $faker->text(50),
        'ciudad_actividad' => $faker->city,
        'pais_actividad' => $faker->country,
        'fechas_disponibles' => [$faker->date, $faker->date],
    ];
});
