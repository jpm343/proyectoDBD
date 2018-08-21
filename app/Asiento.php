<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $primaryKey = 'id_asiento';
    protected $keyType = 'integer';

    protected $fillable = ['id_asiento', 'rut_pasajero', 'clase_asiento', 'numero_asiento', 'nombre_pasajero', 'id_vuelo'];

    //muchos asientos corresponden a un vuelo
    public function vuelo()
    {
    	return $this->belongsTo('App\Vuelo');
    }

    //muchos asientos corresponden a una reserva
    /*
    public function reserva()
    {
    	return $this->belongsTo('App\Reserva');
    }
    */
}
