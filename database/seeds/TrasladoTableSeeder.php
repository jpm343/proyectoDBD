<?php

use Illuminate\Database\Seeder;
use App\Traslado;

class TrasladoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Traslado::class, 20)->create();
    }
}
