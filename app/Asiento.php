<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $primaryKey = 'id_asiento';
    protected $keyType = 'integer';

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
