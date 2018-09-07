<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            // Llave Primaria
            $table->increments('id_traslado');

            // Atributos
            $table->datetime('fecha_traslado');
            $table->text('descripcion_traslado');
            $table->string('origen_traslado');
            $table->string('destino_traslado');
            $table->integer('cantidad_pasajeros');
            $table->integer('precio_traslado');
            
            // Timestamps
            $table->timestamps();

            //llave foranea reserva
            $table->integer('id_reserva');
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
        Schema::dropIfExists('traslados');
    }
}
