<?php

use Illuminate\Database\Seeder;
use App\Habitacion;
use App\Hotel;
use App\Traslado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //corre los seeder de las tablas
        $this->call(RolsTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(RegistroConsultasTableSeeder::class);
    	$this->call(ActividadsTableSeeder::class);
        //los siguientes dependen de usuarios
    	$this->call(FondosTableSeeder::class);
    	$this->call(RegistrosTableSeeder::class);    
=======
    	$this->call(HabitacionTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(TrasladoTableSeeder::class);
>>>>>>> gaboBranch
    }
}