<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'id_vuelo';

    //muchos vuelos son impartidos por una aerolinea
    public function aerolinea()
    {
    	return $this->belongsTo('App\Aerolinea');
    }

    //un vuelo tiene muchos asientos
    public function asiento()
    {
    	return $this->hasMany('App\Asiento');
    }


}
