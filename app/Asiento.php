<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Asiento extends Model{

	public function vuelo(){
		return $this->belogsTo(Vuelo::class, 'vuelo_id');
	}
=======
class Asiento extends Model
{
	//es necesario agregar esto??
    //protected $primaryKey = 'id_asiento';

    //muchos asientos corresponden a un vuelo
    public function vuelo()
    {
    	return $this->belongsTo('App\Vuelo');
    }

    //muchos asientos corresponden a una reserva
    public function reserva()
    {
    	return $this->belongsTo('App\Reserva');
    }
>>>>>>> ea670d12f5d397d9e57402920a7de44b2561876e
}
