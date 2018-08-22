<?php

use Illuminate\Database\Seeder;

class AutosTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Auto::class, 20)->create();
    }
}
