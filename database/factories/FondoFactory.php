<?php

use Faker\Generator as Faker;

$factory->define(App\Fondo::class, function (Faker $faker) {
    return [
        //
        'cuenta_origen' => $faker->creditCardNumber,
        'monto_actual' => $faker->numberBetween(0,1000000),
        'banco_origen' => $faker->company,

        //mientras tanto la llave foranea queda nullable (hasta que el alvaro mande su parte)
        'id_usuario' => rand(1,20),
    ];
});
