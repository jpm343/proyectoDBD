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
            $table->increments('id_registroConsulta');
            $table->enum('tipo_consulta', ['Crear', 'Leer', 'Actualizar', 'Borrar']);
            $table->string('tabla_modificada');
            $table->json('estado_anterior');
            $table->json('estado_actual');
            $table->integer('id_modificado');
            $table->timestamps();//aqui se utiliza el created_at() para ver cuando se realizó la consulta**

        //Llave foranea:
            $table->integer('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
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
