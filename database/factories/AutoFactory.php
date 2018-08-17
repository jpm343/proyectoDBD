<?php

use Faker\Generator as Faker;

$factory->define(App\Auto::class, function (Faker $faker) {
    return [
        'patente_auto' => $faker->asciify('********'),
        'modelo_auto' => $faker->word(),
        'capacidad_auto' => $faker->numberBetween($min = 2, $max = 7),
        'precio_dia_auto' => $faker->randomNumber(),
        'descripcion_auto' => $faker->text(),
        'transmision_auto' => $faker->randomElement($array = array('A', 'M')),
        'nombre_compania' => App\CompaniaAuto::inRandomOrder()->first()->nombre_compania,
    ];
});
