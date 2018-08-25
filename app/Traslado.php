<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    protected $primaryKey = 'id_traslado';
	protected $fillable = [
        'fecha_traslado', 
        'descripcion_traslado', 
        'origen_traslado',
        'destino_traslado',
        'precio_traslado',
        'id_reserva',
    ];

    //un traslado corresponde a una reserva
    public function reserva()
    {
    	return $this->belongsTo('App\Reserva');
    }
}
