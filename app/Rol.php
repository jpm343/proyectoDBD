<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //muchos roles pertenecen a muchos usuarios
    public function usuarios()
    {
    	return $this->belongsToMany('App\Usuarios');
    }
}
