<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //overrido para la clave primaria de la tabla reservas
    protected $primaryKey = 'id_reserva';

    //atributos que pueden ser escritos en masa
    protected $fillable = [
        'cantidad_menores', 'cantidad_mayores', 'ciudad_destino', 'fecha_inicio', 'fecha_fin', 'id_usuario', 'id_actividad',
    ];
    
    //muchas reservas son realizadas por un usuario
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }

    //muchas reservas tienen una actividad
    public function actividad()
    {
    	return $this->belongsTo('App\Actividad');
    }

    //muchas reservas tienen muchas habitaciones
    public function habitacions()
    {
        //segundo argumento corresponde a la tabla intermedia
    	return $this->belongsToMany('App\Habitacion', 'habitacion_reserva');
    }

    //una reserva tiene un traslado
    public function traslado()
    {
    	return $this->hasOne('App\Traslado');
    }

    //muchas reservas tienen muchos autos
    public function autos()
    {
        //segundo argumento corresponde a la tabla intermedia
    	return $this->belongsToMany('App\Auto', 'auto_reserva');
    }

    //una reserva tiene uno o muchos asientos
    public function asientos()
    {
    	return $this->hasMany('App\Asiento');
    }
}
