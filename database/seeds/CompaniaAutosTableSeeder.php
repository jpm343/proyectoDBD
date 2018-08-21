<?php

use Illuminate\Database\Seeder;

class CompaniaAutosTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\CompaniaAutos::class, 20)->create();
    }
}
