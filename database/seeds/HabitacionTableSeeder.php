<?php

use Illuminate\Database\Seeder;
use App\Habitacion;

class HabitacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
    	Se crearán un total de 80 registros con datos falsos.
    	*/
        factory(Habitacion::class, 80)->create();
    }
}
