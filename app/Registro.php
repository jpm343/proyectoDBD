<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //muchos registros pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\usuario');
    }
}
