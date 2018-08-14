<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'vuelo_id';

    public function aerolinea(){
		return $this->belongsTo(Aerolinea::class, 'nombre_aerolinea');
    }

    public function asientos(){
    	return $this->hasMany(Asiento::class, 'vuelo_id');
    }

}
