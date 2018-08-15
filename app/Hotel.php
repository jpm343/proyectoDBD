<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	// Atributos de la clase
	protected $fillable = [
		'puntuacion_hotel',
		'puntuacion_hotel',
		'descripcion_hotel',
		'direccion_hotel',
		'ciudad_hotel',
    ];

    //un hotel tiene muchas habitaciones
    public function habitacions()
    {
    	return $this->hasMany('App\Habitacion');
    }
}
