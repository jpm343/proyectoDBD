<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    //la llave primaria no cumple convencion (no empieza con id ni es numerica) por lo tanto se debe especificar
    protected $primaryKey = 'patente_auto';
    protected $keyType = 'string';
    public $incrementing = false;

    //muchos autos corresponden a muchas reservas
    /*
    public function reservas()
    {
    	return $this->belongsToMany('App\Reserva');
    }
    */

    //muchos autos corresponden a una companiaAuto
    public function companiaAuto()
    {
    	return $this->belongsTo('App\CompaniaAuto');
    }

}
