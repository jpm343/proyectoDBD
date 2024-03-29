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
            $table->increments('id_asiento');
            $table->integer('rut_pasajero')->nullable();
            $table->enum('clase_asiento', ['Turista', 'Ejecutivo', 'Primera Clase']);
            $table->integer('numero_asiento');
            $table->string('nombre_pasajero')->nullable();
            $table->integer('precio');
            $table->timestamps();

            //Llave Foránea con Vuelo
            $table->integer('id_vuelo');
            $table->foreign('id_vuelo')->references('id_vuelo')->on('vuelos')->onDelete('cascade');

            //llave foranea reserva
            $table->integer('id_reserva')->nullable();
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade');
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
