<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//este metodo se ejecuta automatico cuando por consola hacemos migrate
    {
        //crear la tablas en la base de datos con las siguientes columnas
        Schema::create('users', function (Blueprint $table) {
            $table->id();//integre auto-incremenable
            $table->string('name');
            $table->string('email')->unique();//campo de correo que no se repite en la bd
            $table->timestamp('email_verified_at')->nullable();//nullable es la propiedad que indica que esta columna puede quedar vacia
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();//este metodo crea dos columnas create_up update_up
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
