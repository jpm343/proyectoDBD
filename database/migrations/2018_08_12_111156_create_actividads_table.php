<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->increments('id_actividad');
            $table->float('puntuacion_actividad', 1, 2);
            $table->text('nombre_actividad');
            $table->text('descripcion_actividad');
            $table->string('ciudad_actividad');
            $table->string('pais_actividad');
            $table->json('dias_disponibles');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('precio_actividad');
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
        Schema::dropIfExists('actividads');
    }
}
