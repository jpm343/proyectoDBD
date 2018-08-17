<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacions', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('id_habitacion');
=======
            // Llave primaria 
            $table->increments('habitacion_id');
            
            // Atributos de la tabla
>>>>>>> gaboBranch
            $table->integer('numero_habitacion');
            $table->integer('capacidad_habitacion');
            $table->integer('precio_noche_habitacion');
            $table->string('tipo_habitacion');
            
            // Timestamp
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
        Schema::dropIfExists('habitacions');
    }
}
