<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $primaryKey = 'id_vuelo';

    public function aerolinea()
    {

    	return $this->belongsTo('App\Aerolinea');

    }
}
