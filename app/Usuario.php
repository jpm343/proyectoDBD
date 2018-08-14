<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
 
    //un usuario tiene uno o muchos fondos
    public function fondos()
    {
    	return $this->hasMany('App\Fondo');
    }

    //muchos usuarios tienen muchos roles
    public function rols()
    {
        return $this->belongsToMany('App\Rol');
    }

    //un usuario tiene muchos registros de consulta
    public function registroConsultas()
    {
    	return $this->hasMany('App\RegistroConsulta');
    }

    //un usuario tiene muchos registros de transaccion
    public function registros()
    {
    	return $this->hasMany('App\Registro');
    }

    //un usuario realiza muchas reservas
    /*
    public function reservas()
    {
    	return $this->hasMany('App\Reserva');
    }
    */

}
