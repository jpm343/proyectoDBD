<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNonSerialPrimaryKeys extends Migration
{
    /*
    seba: aerilineas, vuelos y asientos.
    gabo: hotel, habitaciones y traslados. 
    */
    
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

        Schema::table('fondos', function (Blueprint $table) {
            $table->primary('cuenta_origen');
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

        Schema::table('fondos', function (Blueprint $table) {
            $table->dropPrimary('cuenta_origen');
        }); 
    }
}
