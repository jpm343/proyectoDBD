<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroConsulta extends Model
{
    //el nombre de la tabla no cumple convencion, por lo tanto es necesario especificar el nombre de la tabla
    protected $table = 'registro_consultas';

    //muchos registros de consulta pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }
}
