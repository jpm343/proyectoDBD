<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_consultas', function (Blueprint $table) {
            $table->increments('auditoria_id');
            $table->integer('cantidad_personas_consultada');
            $table->string('tipo_consulta');
            $table->datetime('fecha_partida_consultada');
            $table->string('ciudad_origen_consultada');
            $table->string('ciudad_destino_consultada');
            $table->datetime('fecha_regreso_consultada');
            $table->timestamps();//aqui se utiliza el created_at() para ver cuando se realizó la consulta**
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_consultas');
    }
}
