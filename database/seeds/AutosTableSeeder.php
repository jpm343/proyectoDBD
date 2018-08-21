<?php

use Illuminate\Database\Seeder;

class AutosTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Autos::class, 20)->create();
    }
}
