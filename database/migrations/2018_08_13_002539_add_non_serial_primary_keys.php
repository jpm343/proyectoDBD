<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNonSerialPrimaryKeys extends Migration
{
    public function up()
    {
        Schema::table('aerolineas', function (Blueprint $table) {
            $table->primary('nombre_aerolinea');
        });

        Schema::table('autos', function (Blueprint $table) {
            $table->primary('patente_auto');
        });

        Schema::table('compania_auto', function (Blueprint $table) {
            $table->primary('nombre_compania');
        });
    }

    public function down()
    {
        Schema::table('aerolineas', function (Blueprint $table) {
            $table->dropPrimary('nombre_aerolinea');
        });

        Schema::table('autos', function (Blueprint $table) {
            $table->dropPrimary('patente_auto');
        });

        Schema::table('compania_auto', function (Blueprint $table) {
            $table->dropPrimary('nombre_compania');
        });
    }
}
