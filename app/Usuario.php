<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Usuario extends Model{
=======
class Usuario extends Model
{
    //protected $primaryKey = 'correo_usuario'; (la llave primaria es en realidad la id de usuario)

    //un usuario tiene uno o muchos fondos
    public function fondo()
    {
    	return $this->hasMany('App\Fondo');
    }

    //muchos usuarios tienen muchos roles
    public function rol()
    {
        return $this->belongsToMany('App\Rol');
    }

    //un usuario tiene muchos registros de consulta
    public function registroConsulta()
    {
    	return $this->hasMany('App\RegistroConsulta');
    }

    //un usuario tiene muchos registros de transaccion
    public function registro()
    {
    	return $this->hasMany('App\Registro');
    }

    //un usuario realiza muchas reservas
    public function reserva()
    {
    	return $this->hasMany('App\Reserva');
    }

>>>>>>> ea670d12f5d397d9e57402920a7de44b2561876e
}
