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
    }

    public function down()
    {
        Schema::dropIfExists('compania_auto');
    }
}
