<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$cambio = 0;

function aerpuertosDisponibles(int $selector)
{
	switch ($selector) 
	{
		case 0:
			return 'Aeropuerto de Concepción';
			break;
		case 1:
			return 'Aeropuerto de Santiago';
		case 2:
			return 'Aeropuerto de Iquique';
		default:
			return 'Aeropuerto de Puerto Montt';
			break;
	}
}

function hotelesDisponibles(int $selector)
{
	switch ($selector) 
	{
		case 0:
			return 'Sheraton miramar';
			break;
		case 1:
			return 'Hotel del mar';
			break;
		case 2:
			return 'Gran hotel del pacífico';
			break;
		default:
			return 'Hotel marina del rey';
			break;
	}	
}

function hotelOAeropuerto()
{
	global $cambio;
	switch($cambio)
	{
		case 0: // Se asigna por primera vez un aeropuerto o un hotel
			if(rand(0,1) == 0) // Asignamos un aeropuerto
			{
				$cambio = 1;
				return aerpuertosDisponibles(rand(0,3));
			}
			else // Asignamos un hotel
			{
				$cambio = 2;
				return hotelesDisponibles(rand(0,3));
			}
		case 1: // Indica que previamente se asignó aeropuerto
			$cambio = 0;
			return hotelesDisponibles(rand(0,3));
		default: // Indica que previamente se asignó hotel
			$cambio = 0;
			return aerpuertosDisponibles(rand(0,3));
	}
}

$factory->define(App\Traslado::class, function (Faker $faker) {
    return [
		'fecha_traslado' 		=> Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp()),
        'descripcion_traslado' 	=> $faker->text(150),
        'origen_traslado'		=> hotelOAeropuerto(),
        'destino_traslado' 		=> hotelOAeropuerto(),
        'cantidad_pasajeros'	=> rand(1, 50),
        'precio_traslado'		=> rand(0, 500000),
        'id_reserva'            => rand(1, 20),
        'disponibilidad'		=> true
    ];
});
