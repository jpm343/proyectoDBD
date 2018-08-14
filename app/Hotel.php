<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //un hotel tiene muchas habitaciones
    public function habitacions()
    {
    	return $this->hasMany('App\Habitacion');
    }
}
