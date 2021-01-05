<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgragarAvatarToCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //este metodo ya no llama a crear sino que hace referencia a la tabla que se especifico anteriormente por comando que deseamos modificar
        Schema::table('cursos', function (Blueprint $table) {
            //agregamos la columna que queramos a la tabla cursos
            //la columna nueva siempre se agrega al final si queremos colocarla en algun lugar especifico solo llamamos a la funcion ->after('nombre_de_la_columna')
            $table->string('avatar')->nullable();//hay que poner la columna nueva null

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            //para eliminar la columna nueva creada
            $table->dropColumn('avatar');
        });
    }
}
