<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompaniaAuto extends Model
{
    protected $primaryKey = 'nombre_compania';

    //una companiaAuto tiene muchos autos
    public function autos()
    {
    	return $this->hasMany('App\Auto');
    }
}
