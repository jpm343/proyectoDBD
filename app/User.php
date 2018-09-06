<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'id_rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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
