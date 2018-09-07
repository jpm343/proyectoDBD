<?php

use Faker\Generator as Faker;

$factory->define(App\RegistroConsulta::class, function (Faker $faker) {
    return [
    	'id_usuario' => App\User::inRandomOrder()->first()->id,
        'tipo_consulta' => $faker->randomElement(['Crear', 'Leer', 'Actualizar', 'Borrar']),
        'tabla_modificada' => $faker->word(),
        'id_modificado' => rand(1, 20), 
        'estado_anterior' => json_encode($faker->word()),
        'estado_actual' => json_encode($faker->word()),
    ];
});
