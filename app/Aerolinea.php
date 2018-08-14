<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    protected $primaryKey = 'nombre_aerolinea';

    //una aerolinea imparte muchos vuelos
    public function vuelos()
    {
<<<<<<< HEAD

    	return $this->hasMany(Vuelo::class, 'nombre_aerolinea');
=======
    	return $this->hasMany('App\Vuelo');
>>>>>>> ea670d12f5d397d9e57402920a7de44b2561876e

    }
}
