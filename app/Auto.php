<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    //la llave primaria no cumple convencion (no empieza con id ni es numerica) por lo tanto se debe especificar
    protected $primaryKey = 'patente_auto';
    protected $keyType = 'string';
    public $incrementing = false;

    // para crear/actualizar por medio de Auto::create y Auto::update
    // ver controlador (app/Http/Controllers/AutoController.php)
    protected $fillable = [
        'patente_auto',
        'modelo_auto',
        'capacidad_auto',
        'precio_dia_auto',
        'descripcion_auto',
        'transmision_auto',
        'nombre_compania',
    ];

    //muchos autos corresponden a muchas reservas
    public function reservas()
    {
        //segundo argumento corresponde a la tabla intermedia
    	return $this->belongsToMany('App\Reserva', 'auto_reserva');
    }

    //muchos autos corresponden a una companiaAuto
    public function companiaAuto()
    {
    	return $this->belongsTo('App\CompaniaAuto');
    }

}
