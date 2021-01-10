<?php

use App\Http\Controllers\ColaController;
use Illuminate\Support\Facades\Route;
//añadiendo el namespace del controlador 
use App\Http\Controllers\Ejemplo2Controller;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ParqueoController;
use App\Http\Controllers\VehiculoController;

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

/*Route::get('/', function () {  
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

//creando enlaces de paginas al sitio web laravel 5-7
//Route::get('/inicio', 'PaginasController@index');

//ruta para acceder directo a todos los metodos que brinda controller al crearlo con artisan resource
//para ver la ruta especifica a cada uno de ellos(de los metodos del controller), con el comando php artisan route:list
//Route::resource("mio", "Ejemplo2Controller");

//forma para poner las rutas en laravel 8
/*Route::get("/ruta",[Ejemplo2Controller::class,"index"]);*/

//Route::get("/inicio", [PaginasController::class,"index"])->name('p_inicio');


Route::get("/", [ParqueoController::class,"index"])->name('p_gestion_parqueos');

Route::post("crearparqueo", [ParqueoController::class,"createParqueo"])->name('p_crearparqueo'); 

Route::get("/listar_parqueo", [ParqueoController::class,"listarParqueo"])->name('p_listarparqueo');

Route::get("/cola", [ColaController::class,"index"])->name('p_inicio');
Route::get("/listar_cola", [ColaController::class,"listar"])->name('p_listar_cola');


Route::post("/crearvehiculo/{vehiculo}", [VehiculoController::class,"addvehiculo"])->name('p_addvehiculo');
Route::post("/moto", [VehiculoController::class,"addmoto"])->name('p_addmoto');
Route::post("/carro", [VehiculoController::class,"addcarro"])->name('p_addcarro');
Route::post("/camion", [VehiculoController::class,"addcamion"])->name('p_addcamion');

//Route::get("/listar_estacionamiento/{nombre}", [ParqueoController::class,"listarestacionamiento"])->name('p_listarestacionamiento');



//Route::get("/primer_registro/{id}", [PaginasController::class,"show"])->name('info');

/*Route::get("/contacto", [PaginasController::class,"contacto"]);

Route::get("/acercad/{id}", [PaginasController::class,"show"]);*/
