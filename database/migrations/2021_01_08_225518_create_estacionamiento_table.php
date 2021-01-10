<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstacionamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estacionamiento', function (Blueprint $table) {
            $table->id('id_estacionamiento');
            $table->string('parqueo_id');
            $table->string('vehiculo_id');
            $table->string('vehiculo_tipo');
            $table->string('disponibilidad_total');
            $table->string('disponibilidad_peq');
            $table->string('disponibilidad_mediana');
            $table->string('disponibilidad_grande');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estacionamiento');
    }
}
