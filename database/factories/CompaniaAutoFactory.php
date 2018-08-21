<?php

use Faker\Generator as Faker;

$factory->define(App\CompaniaAuto::class, function (Faker $faker) {
    $a1 = array();
    $a2 = array();
    for ($i = 0; $i < $faker->randomDigitNotNull; $i++) {
        $a1[] = $faker->unique()->country();
        for ($j = 0; $j < $faker->randomDigitNotNull; $j++) {
            $a2[] = $faker->unique()->city();
        }
    }
    return [
        'nombre_compania' => $faker->company(),
        'paises_de_atencion' => $a1,
        'ciudades_de_atencion' => $a2
    ];
});
