<?php

use Illuminate\Database\Seeder;

class CompaniaAutosTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\CompaniaAuto::class, 20)->create();
    }
}
