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

    //muchos usuarios pueden tener muchos roles
    public function rol()
    {
        //segundo argumento corresponde a la tabla intermedia
        return $this->belongsToMany('App\Rol', 'rol_usuario');
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
    public function reservas()
    {
    	return $this->hasMany('App\Reserva');
    }
    

}
