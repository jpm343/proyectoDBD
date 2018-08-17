<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'nombre_usuario' => $faker->name,
        'correo_usuario' => $faker->unique()->safeEmail,
        'password_usuario' => bcrypt('password'),
        'id_rol' => rand(1, 4),//Se tienen 4 roles
    ];
});
