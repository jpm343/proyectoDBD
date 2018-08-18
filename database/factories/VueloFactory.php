<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    return [
        'fecha_salida' => $faker->dateTime($max = 'now', $timezone = null),
        'fecha_llegada' => $faker->dateTime($max = 'now', $timezone = null),
        'ciudad_origen' => $faker->word(),
        'ciudad_destino' => $faker->word(),
        'aeropuerto_origen' => $faker->word(),
        'aeropuerto_destino' => $faker->word(),
        'pais_origen' => $faker->word(),
        'pais_destino' => $faker->word(),
        'nombre_aerolinea' => $faker->word()
    ];
});
