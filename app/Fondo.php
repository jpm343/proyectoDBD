<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
	//la llave primaria no cumple convencion (no empieza con id ni es numerica) por lo tanto se debe especificar
    protected $primaryKey = 'cuenta_origen';
    protected $keyType = 'string';
    public $incrementing = false;

    //muchos fondos pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App/Usuario');
    }
}
