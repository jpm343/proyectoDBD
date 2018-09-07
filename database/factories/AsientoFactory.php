<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento::class, function (Faker $faker) {
	
	$rut = $faker->randomElement([$faker->randomNumber($nbDigits = NULL, $strict = false),NULL]);
	$reserva = App\Reserva::inRandomOrder()->first()->id_reserva;
	$nombre = $faker->firstNameMale();
	if ($rut == NULL) {
		$nombre = NULL;
		$reserva = NULL;
	}

    return [
        'rut_pasajero' => $rut,
        'clase_asiento' => $faker->randomElement(['Turista', 'Ejecutivo', 'Primera Clase']),
        'numero_asiento' => $faker->randomDigitNotNull(),
        'nombre_pasajero' => $nombre,
        'precio' => rand(100,1000),
        'id_vuelo' => App\Vuelo::inRandomOrder()->first()->id_vuelo,
        'id_reserva' => $reserva
    ];
});
