<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFondosPrimaryKey extends Migration
{
    public function up()
    {
        Schema::table('fondos', function (Blueprint $table) {
            $table->primary('cuenta_origen');
        });
    }

    public function down()
    {
        Schema::table('fondos', function (Blueprint $table) {
            $table->dropPrimary('cuenta_origen');
        });
    }
}
