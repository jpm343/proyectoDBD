<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model{

    //una aerolinea imparte muchos vuelos
    public function vuelos(){
    	return $this->hasMany(Vuelo::class, 'nombre_aerolinea');
    }
}
