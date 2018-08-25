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
            // Llave primaria 
            $table->increments('id_habitacion');
            
            // Atributos de la tabla
            $table->integer('numero_habitacion');
            $table->integer('capacidad_habitacion');
            $table->integer('precio_noche_habitacion');
            $table->string('tipo_habitacion');
            
            // Timestamp
            $table->timestamps();

            //llave foranea hotel
            $table->integer('id_hotel');
            $table->foreign('id_hotel')->references('id_hotel')->on('hotels')->onDelete('cascade');
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
