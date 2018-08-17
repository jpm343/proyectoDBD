<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('id_hotel');
=======
            // Lave primaria
            $table->increments('hotel_id');

            // Artibutos
            $table->text('nombre_hotel');
>>>>>>> gaboBranch
            $table->float('puntuacion_hotel', 1, 2);
            $table->text('descripcion_hotel');
            $table->string('direccion_hotel');
            $table->string('ciudad_hotel');
            
            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
