<?php

use Illuminate\Database\Seeder;
use App\Registro;

class RegistrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Registro::class, 20)->create();
    }
}
