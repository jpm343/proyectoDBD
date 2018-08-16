    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->increments('id_vuelo');
            $table->datetime('fecha_salida');
            $table->datetime('fecha_llegada');
            $table->string('ciudad_origen');
            $table->string('ciudad_destino');
            $table->string('aeropuerto_origen');
            $table->string('aeropuerto_destino');
            $table->string('pais_origen');
            $table->timestamps();

            //Llave Foránea
            $table->string('nombre_aerolinea');
            $table->foreign('nombre_aerolinea')->references('nombre_aerolinea')->on('aerolineas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelos');
    }
}
