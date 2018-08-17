<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//corre los seeder de las tablas
    	$this->call(ActividadsTableSeeder::class);
        //los siguientes dependen de usuarios
    	//$this->call(FondosTableSeeder::class);
    	//$this->call(RegistrosTableSeeder::class);
    }
}
