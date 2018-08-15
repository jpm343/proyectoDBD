<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    protected $primaryKey = 'traslado_id';
	protected $fillable = [
        'fecha_traslado', 
        'descripcion_traslado', 
        'body',
        'origen_traslado',
        'destino_traslado',
        'precio_traslado',
    ];

    //un traslado corresponde a una reserva
    public function reserva()
    {
    	return $this->belongsTo('App\Reserva');
    }
}
