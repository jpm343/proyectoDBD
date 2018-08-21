<?php

use Faker\Generator as Faker;

$factory->define(App\Registro::class, function (Faker $faker) {
    return [
        //
    	'fecha_registro' => $faker->date("Y-m-d H:i:s"),
    	'tipo_transaccion' => ($faker->creditCardDetails)["type"],
    	'subtotal_registro' => $faker->numberBetween(20000, 10000000),
    	//mientras tanto la llave foranea queda nullable (hasta que el alvaro mande su parte)
        'id_usuario' => rand(1,20),
    ];
});
