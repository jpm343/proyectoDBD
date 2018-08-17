<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
	//la llave primaria no cumple convencion (no empieza con id ni es numerica) por lo tanto se debe especificar
    protected $primaryKey = 'nombre_aerolinea';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['nombre_aerolinea', 'puntuacion_aerolinea' , 'tipo_aerolinea'];

    //una aerolinea imparte muchos vuelos
    public function vuelos()
    {
    	return $this->hasMany('App\Vuelo');

    }
}
