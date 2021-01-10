<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creando una instancia de la tabla curso (creando los reguistros en la tabla curso)
        $curso= new Curso;
        $curso->name="laravel";
        $curso->comentario="el frame tiza de php";
        $curso->save();

        
    }
}
