<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
 
    protected $primaryKey = 'id_usuario'; 

    protected $fillable = ['nombre_usuario','correo_usuario','password_usuario','id_rol'];

    protected $hidden = ['password_usuario',];

    //un usuario tiene uno o muchos fondos
    public function fondos()
    {
    	return $this->hasMany('App\Fondo');
    }

    
    public function rol()
    {
        return $this->belongsTo('App\Rol');
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
