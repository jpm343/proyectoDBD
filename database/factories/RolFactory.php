<?php

use Faker\Generator as Faker;

$factory->define(App\Rol::class, function (Faker $faker) {
    return [
        'nombre_rol' => $faker->unique()->word(),
        'descripcion' => $faker->unique()->word(),
    ];
});
