<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutoReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_reserva', function (Blueprint $table) {
            //llave foranea auto
            $table->string('patente_auto');
            $table->foreign('patente_auto')->references('patente_auto')->on('autos');

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
        Schema::dropIfExists('auto_reserva');
    }
}
