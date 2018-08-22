<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HabitacionReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacion_reserva', function (Blueprint $table) {
            //llave foranea habitacion
            $table->integer('id_habitacion');
            $table->foreign('id_habitacion')->references('id_habitacion')->on('habitacions');

            //llave foranea reserva
            $table->integer('id_reserva');
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitacion_reserva');
    }
}
