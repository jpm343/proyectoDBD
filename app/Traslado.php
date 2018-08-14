<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    //un traslado corresponde a una reserva
    public function reserva()
    {
    	return $this->belongsTo('App\Reserva');
    }
}
