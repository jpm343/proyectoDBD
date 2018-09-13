<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $primaryKey   = 'id_habitacion';

    protected $fillable = [
        'numero_habitacion', 
        'capacidad_habitacion',
        'precio_noche_habitacion',
        'tipo_habitacion',
        'id_hotel',
    ];

    //muchas habitaciones corresponden a muchas reservas
    public function reservas()
    {
        //segundo argumento corresponde a la tabla intermedia
    	return $this->belongsToMany('App\Reserva', 'habitacion_reserva', 'id_habitacion', 'id_reserva');
    }

    //muchas habitaciones pertenecen a un hotel
    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
