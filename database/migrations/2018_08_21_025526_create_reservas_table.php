<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id_reserva');
            $table->integer('cantidad_menores');
            $table->integer('cantidad_mayores');
            $table->string('ciudad_destino');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();

            //llave foranea usuario
            $table->integer('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');

            //llave foranea actividad
            $table->integer('id_actividad')->nullable();//una reserva puede no tener una actividad asociada
            $table->foreign('id_actividad')->references('id_actividad')->on('actividads')->onDelete('cascade');

            //faltan las muchos a muchos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
