<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{

    //muchos vuelos son impartidos por una aerolinea
    public function aerolinea()
    {
    	return $this->belongsTo('App\Aerolinea');
    }

    //un vuelo tiene muchos asientos
    public function asientos()
    {
    	return $this->hasMany('App\Asiento');
    }


}
