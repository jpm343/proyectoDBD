<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'nombre_usuario' => $faker->name,
        'correo_usuario' => $faker->unique()->safeEmail,
        'password_usuario' => bcrypt('password'),
        'id_rol' => App\Rol::inRandomOrder()->first()->id_rol,//Se tienen 4 roles
    ];
});
