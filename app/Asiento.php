<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model{

	public function vuelo(){
		return $this->belogsTo(Vuelo::class, 'vuelo_id');
	}
}
