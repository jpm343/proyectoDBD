<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
	//override para la clave primaria de la tabla registros
	protected $primaryKey = 'id_registro';

	//atributos que pueden ser escritos en masa
    protected $fillable = [
        'fecha_registro', 'tipo_transaccion', 'subtotal_registro', 'id_usuario',
    ];

    //muchos registros pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }
}
