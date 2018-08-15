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
            $table->increments('id');

            // Atributos
            $table->datetime('fecha_traslado');
            $table->text('descripcion_traslado');
            $table->string('origen_traslado');
            $table->string('destino_traslado');
            $table->integer('precio_traslado');
            
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
        Schema::dropIfExists('traslados');
    }
}
