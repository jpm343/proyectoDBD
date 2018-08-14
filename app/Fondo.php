<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    protected $primaryKey = 'cuenta_origen';

    //muchos fondos pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App/Usuario');
    }
}
