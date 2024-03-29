<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    //override para el nombre de la llave primaria de la tabla fondos
	protected $primaryKey = 'id_fondos';

    //atributos que pueden ser escritos en masa
    protected $fillable = [
        'cuenta_origen', 'monto_actual', 'banco_origen', 'id_usuario',
    ];

    //muchos fondos pertenecen a un usuario
    public function usuario()
    {
    	return $this->belongsTo('App/User');
    }

    //mutador para actualizar un monto
    public function setMontoActualAttribute($value)
    {
        $this->attributes['monto_actual'] = $value;
    }
}
