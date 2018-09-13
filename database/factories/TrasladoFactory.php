<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

function hotelOAeropuerto()
{
	switch (rand(0, 7)) 
	{
		case 0:
			return 'Aeropuerto de Santiago';
			break;
		case 1:
			return 'Hotel Sheraton';
			break;
		case 2:
			return 'Aeropuerto de Iquique';
			break;
		case 3:
			return 'Hotel del mañana';
			break;
		case 4:
			return 'Aeropuerto de Puerto Montt';
			break;
		case 5:
			return 'Hotel brisas del ayer';
			break;
		case 6:
			return 'Aeropuerto de La Serena';
			break;
		default:
			return 'Hotel donde tu tia';
			break;
	}
}

$factory->define(App\Traslado::class, function (Faker $faker) {
    return [
		'fecha_traslado' 		=> Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp()),
        'descripcion_traslado' 	=> $faker->text(150),
        'origen_traslado'		=> hotelOAeropuerto(),
        'destino_traslado' 		=> hotelOAeropuerto(),
        'cantidad_pasajeros'	=> rand(0, 25),
        'precio_traslado'		=> rand(0, 500000),
        'id_reserva'            => rand(1, 20),
    ];
});
