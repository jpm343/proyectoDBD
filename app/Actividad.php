<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //override para la clave primaria de la tabla actividads
	protected $primaryKey = 'id_actividad';

    //atributos que pueden ser escritos en masa
    protected $fillable = [
        'puntuacion_actividad', 'nombre_actividad', 'descripcion_actividad', 'ciudad_actividad', 'pais_actividad', 'dias_disponibles', 'hora_inicio', 'hora_fin', 'precio_actividad',
    ];

	//para el arreglo de fechas:
	protected $casts = [
		'dias_disponibles' => 'array',
	];
    //una actividad corresponde a muchas reservas
    public function reservas()
    {
    	return $this->hasMany('App\Reserva');
    }
    
}
