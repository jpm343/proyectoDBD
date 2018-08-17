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
        factory(Habitacion::class, 20)->create();
    }
}
