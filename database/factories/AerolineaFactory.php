<?php

use Faker\Generator as Faker;

$factory->define(App\Aerolinea::class, function (Faker $faker) {
    return [
        'nombre_aerolinea' => $faker->word(),
        'puntuacion' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'tipo_aerolinea' => $faker->word()
    ];
});
