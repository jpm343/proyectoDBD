<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //override para la clave primaria de la tabla actividads
	protected $primaryKey = 'id_actividad';

    //atributos que pueden ser escritos en masa
    protected $fillable = [
        'puntuacion_actividad', 'nombre_actividad', 'descripcion_actividad', 'ciudad_actividad', 'pais_actividad', 'fechas_disponibles',
    ];

	//para el arreglo de fechas:
	protected $casts = [
		'fechas_disponibles' => 'array',
	];
    //una actividad corresponde a muchas reservas
    public function reservas()
    {
    	return $this->hasMany('App\Reserva');
    }
    
}
