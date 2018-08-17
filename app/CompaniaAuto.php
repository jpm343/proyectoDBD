<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompaniaAuto extends Model
{
	//la llave primaria no cumple convencion (no empieza con id ni es numerica) por lo tanto se debe especificar
    protected $primaryKey = 'nombre_compania';
    protected $keyType = 'string';
    public $incrementing = false;

    //el nombre de la tabla no cumple convencion, por lo tanto es necesario especificar el nombre de la tabla
    protected $table = 'compania_auto';

    //una companiaAuto tiene muchos autos
    public function autos()
    {
    	return $this->hasMany('App\Auto');
    }
}
