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
*/

Route::get("/", [ParqueoController::class,"index"])->name('p_gestion_parqueos');

Route::post("crearparqueo", [ParqueoController::class,"createParqueo"])->name('p_crearparqueo'); 

Route::get("/listar_parqueo", [ParqueoController::class,"listarParqueo"])->name('p_listarparqueo');

Route::get("/cola", [ColaController::class,"index"])->name('p_inicio');
Route::get("/listar_cola", [ColaController::class,"listar"])->name('p_listar_cola');


Route::post("/liberarcampo", [ParqueoController::class,"liberarCampo"])->name('p_liberar');
Route::post("/moto", [VehiculoController::class,"addmoto"])->name('p_addmoto');
Route::post("/carro", [VehiculoController::class,"addcarro"])->name('p_addcarro');
Route::post("/camion", [VehiculoController::class,"addcamion"])->name('p_addcamion');
