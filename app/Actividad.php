<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //una actividad corresponde a muchas reservas
    public function reserva()
    {
    	return $this->hasMany('App\Reserva');
    }
}
