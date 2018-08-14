<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroConsulta extends Model
{
    //la tabla registro_consultas debe ser modificada (revisar el facebook de DBD)

    //muchos registros de consulta pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }
}
