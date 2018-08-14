<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    //muchas habitaciones corresponden a muchas reservas
    public function reservas()
    {
    	return $this->belongsToMany('App\Reserva');
    }

    //muchas habitaciones pertenecen a un hotel
    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
