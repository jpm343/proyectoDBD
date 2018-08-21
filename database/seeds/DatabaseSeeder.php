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
        $this->call(RolsTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(RegistroConsultasTableSeeder::class);
    	$this->call(ActividadsTableSeeder::class);
    	$this->call(CompaniaAutosTableSeeder::class);
    	$this->call(AutosTableSeeder::class);

        //los siguientes dependen de usuarios
    	$this->call(FondosTableSeeder::class);
    	$this->call(RegistrosTableSeeder::class);
    	$this->call(HabitacionTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(TrasladoTableSeeder::class);
    }
}
