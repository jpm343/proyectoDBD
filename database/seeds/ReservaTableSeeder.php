<?php

use Illuminate\Database\Seeder;
use App\Reserva;

class ReservaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Reserva::class, 20)->create();
    }
}
