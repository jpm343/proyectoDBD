<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    protected $primaryKey = 'nombre_aerolinea';

    public function vuelos()
    {

    	return $this->hasMany(Vuelo::class, 'nombre_aerolinea');

    }
}
