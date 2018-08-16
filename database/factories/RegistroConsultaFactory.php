<?php

use Faker\Generator as Faker;

$factory->define(App\RegistroConsulta::class, function (Faker $faker) {

    return [
    	'id_usuario' => rand(1, 20), //factory('App\Usuario')->create()->id_usuario, 
		'cantidad_personas_consultada' => rand(0, 500),
        'tipo_consulta' => $faker->randomElement(['Crear', 'Leer', 'Actualizar', 'Borrar']),
        'fecha_partida_consultada' => $faker->dateTimeBetween($startDate = '2017-12-31', $endDate = 'now'),
        'ciudad_origen_consultada' => $faker->word(),
        'ciudad_destino_consultada' => $faker->word(),
        'fecha_regreso_consultada' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2020-12-31'),
    ];
});
