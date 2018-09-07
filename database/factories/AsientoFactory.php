<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento::class, function (Faker $faker) {
    return [
        'rut_pasajero' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'clase_asiento' => $faker->randomElement(['Turista', 'Ejecutivo', 'Primera Clase']),
        'numero_asiento' => $faker->randomDigitNotNull(),
        'nombre_pasajero' => $faker->firstNameMale(),
        'id_vuelo' => App\Vuelo::inRandomOrder()->first()->id_vuelo,
        'id_reserva' => App\Reserva::inRandomOrder()->first()->id_reserva
    ];
});
