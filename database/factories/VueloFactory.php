<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    $fechaMinima = $faker->dateTimeBetween($startDate = 'now', $max = '+1 hour');

    return [
        'fecha_salida' => $fechaMinima,
        'fecha_llegada' => $faker->dateTimeBetween($min = $fechaMinima, $max = '+1 day'),
        'equipaje' => rand(1,5),
        'ciudad_origen' => $faker->word(),
        'ciudad_destino' => $faker->word(),
        'aeropuerto_origen' => $faker->word(),
        'aeropuerto_destino' => $faker->word(),
        'pais_origen' => $faker->word(),
        'pais_destino' => $faker->word(),
        'nombre_aerolinea' => App\Aerolinea::inRandomOrder()->first()->nombre_aerolinea
    ];
});
