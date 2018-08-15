<?php

use Illuminate\Database\Seeder;
use App\Habitacion;
use App\Hotel;
use App\Traslado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(HabitacionTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(TrasladoTableSeeder::class);
    }
}