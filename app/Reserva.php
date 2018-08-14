<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Reserva extends Model{
	
=======
class Reserva extends Model
{
    //protected $primaryKey = 'id_reserva';

    //muchas reservas son realizadas por un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }

    //muchas reservas tienen una actividad
    public function actividad()
    {
    	return $this->belongsTo('App\Actividad');
    }

    //una reserva corresponde a una o muchas habitacionesS
    public function habitacions()
    {
    	return $this->hasMany('App\Habitacion');
    }

    //una reserva tiene un traslado
    public function traslado()
    {
    	return $this->hasOne('App\Traslado');
    }

    //muchas reservas tienen muchos autos
    public function autos()
    {
    	return $this->belongsToMany('App\Auto');
    }

    //una reserva tiene uno o muchos asientos
    public function asientos()
    {
    	return $this->hasMany('App\Asiento');
    }
>>>>>>> ea670d12f5d397d9e57402920a7de44b2561876e
}
