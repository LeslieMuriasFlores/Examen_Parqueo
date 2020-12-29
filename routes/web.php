<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {  
    return view('welcome');
});

/*Route::get('/home', function () {  
    return "esta es la pagina de inicio ";
});

Route::get('/sobrenosotros', function () {  
    return "esta es la pagina q habla de nosotros ";
});

Route::get('/contacto', function () {  
    return "esta es la pagina de los contactos ";
});

//pasar un parametro a la url
Route::get('/post/{id}', function ($id) {  
    return "Este es el post # . $id ";
});
//pasar mas de un parametro por la url
Route::get('/post/{id}/{nombre}', function ($id,$nombre) {  
    return "Este es el post #  $id  realizado por  $nombre";
//trabajando con una expresion regular para limitar q el segundo parametro sea solo letras y no se pueda introducir numeros
})->where('nombre', '[a-zA-Z]+');*/

/*//de esta forma tras escribir inicio en el navegador llama al metodo inicio() del controlador ejemploController.
Route::get('/principal', 'Ejemplo2Controller@index');

//pasar un parametro a la url
Route::get('/post/{id}', function ($id) {  
    return "Este es el post # . $id ";
});*/

//creando enlaces de paginas al sitio web
Route::get('/inicio', 'PaginasController@index');

//ruta para acceder directo a todos los metodos que brinda controller al crearlo con artisan resource
//para ver la ruta especifica a cada uno de ellos(de los metodos del controller), con el comando php artisan route:list
Route::resource("mio", "Ejemplo2Controller");
