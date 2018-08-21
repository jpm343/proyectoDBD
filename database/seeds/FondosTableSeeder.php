<?php

use Illuminate\Database\Seeder;
use App\Fondo;

class FondosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//busca los archivos en factory y rellena 80 registros
        factory(Fondo::class, 20)->create();
    }
}
