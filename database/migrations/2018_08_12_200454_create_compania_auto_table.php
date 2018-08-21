<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniaAutoTable extends Migration
{
    public function up()
    {
        Schema::create('compania_auto', function (Blueprint $table) {
            $table->string('nombre_compania')->primary();
            $table->json('paises_de_atencion');
            $table->json('ciudades_de_atencion');
            $table->timestamps();
        });

        // agregar llave foranea a autos
        Schema::table('autos', function (Blueprint $table) {
            $table->string('nombre_compania');
            $table->foreign('nombre_compania')->references('nombre_compania')->on('compania_auto')->onDelete('cascade');
        });
    }

    public function down()
    {
        // eliminar llave foranea en autos antes de esta tabla
        Schema::table('autos', function (Blueprint $table) {
            $table->dropColumn('nombre_compania');
        });

        Schema::dropIfExists('compania_auto');
    }
}
