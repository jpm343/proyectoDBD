<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'id_vuelo';
    protected $keyType = 'integer';

    protected $fillable = ['id_vuelo', 'fecha_salida', 'fecha_llegada', 'equipaje', 'ciudad_origen', 'ciudad_destino', 'aeropuerto_origen', 'aeropuerto_destino', 'pais_origen', 'pais_destino', 'precio', 'nombre_aerolinea',];


    //muchos vuelos son impartidos por una aerolinea
    public function aerolinea()
    {
    	return $this->belongsTo('App\Aerolinea');
    }

    //un vuelo tiene muchos asientos
    public function asientos()
    {
    	return $this->hasMany('App\Asiento');
    }


}
