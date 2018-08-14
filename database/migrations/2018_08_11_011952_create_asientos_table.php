<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asientos', function (Blueprint $table) {
            $table->increments('asiento_id');
            $table->integer('rut_pasajero');
            $table->string('clase_asiento');
            $table->integer('numero_asiento');
            $table->string('nombre_pasajero');
            $table->timestamps();

            //Llave Foránea con Vuelo
            $table->integer('vuelo_id');
            $table->foreign('vuelo_id')->references('vuelo_id')->on('vuelos')->onDelete('cascade');
            //Llave Foránea con Reserva
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asientos');
    }
}
