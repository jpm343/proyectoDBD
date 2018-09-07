<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    return [
        'fecha_salida' => $faker->date,
        'fecha_llegada' => $faker->date,
        'ciudad_origen' => $faker->word(),
        'ciudad_destino' => $faker->word(),
        'aeropuerto_origen' => $faker->word(),
        'aeropuerto_destino' => $faker->word(),
        'pais_origen' => $faker->word(),
        'pais_destino' => $faker->word(),
        'nombre_aerolinea' => App\Aerolinea::inRandomOrder()->first()->nombre_aerolinea
    ];
});
