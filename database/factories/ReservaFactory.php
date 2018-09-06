<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
    return [
        'cantidad_menores' => rand(1, 5),
		'cantidad_mayores' => rand(1, 5),
		'ciudad_destino' => $faker->city,
		'fecha_inicio' => $faker->date,
		'fecha_fin' => $faker->date,
		'id_usuario' => App\User::inRandomOrder()->first()->id,
		'id_actividad' => App\Actividad::inRandomOrder()->first()->id_actividad,
    ];
});
