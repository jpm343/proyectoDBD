<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroConsulta extends Model
{
	protected $primaryKey   = 'id_auditoria';

	protected $fillable = ['cantidad_personas_consultada','tipo_consulta','fecha_partida_consultada','ciudad_origen_consultada','fecha_regreso_consultada','ciudad_destino_consultada',];

    //el nombre de la tabla no cumple convencion, por lo tanto es necesario especificar el nombre de la tabla
    protected $table = 'registro_consultas';

    //muchos registros de consulta pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }
}
