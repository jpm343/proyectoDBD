<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    protected $primaryKey = 'nombre_aerolinea';

    //una aerolinea imparte muchos vuelos
    public function vuelos()
    {
    	return $this->hasMany('App\Vuelo');

    }
}
