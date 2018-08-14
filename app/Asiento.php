<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
	//es necesario agregar esto??
    //protected $primaryKey = 'id_asiento';

    //muchos asientos corresponden a un vuelo
    public function vuelo()
    {
    	return $this->belongsTo('App\Vuelo');
    }

    //muchos asientos corresponden a una reserva
    /*
    public function reserva()
    {
    	return $this->belongsTo('App\Reserva');
    }
    */
}
