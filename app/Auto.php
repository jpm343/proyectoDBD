<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $primaryKey = 'patente_auto';

    //muchos autos corresponden a muchas reservas
    public function reservas()
    {
    	return $this->belongsToMany('App\Reserva');
    }

    //muchos autos corresponden a una companiaAuto
    public function companiaAuto()
    {
    	return $this->belongsTo('App\CompaniaAuto');
    }

}
