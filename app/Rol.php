<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $primaryKey   = 'id_rol';

	protected $fillable = ['nombre_rol','descripcion'];

    
    public function usuarios()
    {
    	return $this->hasMany('App\Usuarios');
    }

}
