<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->string('patente_auto')->unique();
            $table->string('modelo_auto');
            $table->integer('capacidad_auto');
            $table->integer('precio_dia_auto');
            $table->text('descripcion_auto');
            $table->enum('transmision_auto', ['A', 'M']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('autos');
    }
}
