<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParqueoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueo', function (Blueprint $table) {
            $table->id("id_parqueo");
            $table->string('nombre');
            $table->string('cant_plazas_total');
            $table->string('cant_plazas_peq');
            $table->string('cant_plazas_medianas');
            $table->string('cant_plazas_grandes');
            $table->string('vehiculo_id')->nullable();
            $table->string('cola_id')->nullable();
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
        Schema::dropIfExists('parqueo');
    }
}
