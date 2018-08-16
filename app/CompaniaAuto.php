<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompaniaAuto extends Model
{
    //la llave primaria no cumple convencion (no empieza con id ni es numerica) por lo tanto se debe especificar
    protected $primaryKey = 'nombre_compania';
    protected $keyType = 'string';
    public $incrementing = false;

    //el nombre de la tabla no cumple convencion, por lo tanto es necesario especificar el nombre de la tabla
    protected $table = 'compania_auto';

    // paises_de_atencion y ciudades_de_atencion son atributos multivaluados.
    // este atributo $casts informa a Eloquent que debe deserializar el valor
    //     json almacenado en estos atributos a arreglos.
    protected $casts = [
        'paises_de_atencion' => 'array',
        'ciudades_de_atencion' => 'array'
    ];

    //una companiaAuto tiene muchos autos
    public function autos()
    {
    	return $this->hasMany('App\Auto');
    }
}
