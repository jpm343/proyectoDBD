<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $primaryKey   = 'id_rol';

	protected $fillable = ['nombre_rol','descripcion'];

    //muchos roles pertenecen a muchos usuarios
    public function usuarios()
    {
    	//segundo argumento corresponde a la tabla intermedia
    	return $this->belongsToMany('App\User', 'rol_usuario');
    }

}
