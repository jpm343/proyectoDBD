<?php

use Illuminate\Database\Seeder;
use App\RegistroConsulta;

class RegistroConsultasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RegistroConsulta::class,20)->create();
    }
}
