<?php

namespace App\Http\Controllers;

use App\Models\parqueo;
use Illuminate\Http\Request;
use App\Models\cola;
use App\Models\estacionamiento;

class ParqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ir a la pagina para reguistrar un parqueo o seleccionar uno ya existente.
        $parqueos=parqueo::paginate(10);   
        return view("registro",compact('parqueos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createParqueo(Request $request)
    {
        //crear un parqueo nuevo 

        $parqueo=new parqueo();
        $parqueo->nombre=$request->nombre;
        $parqueo->cant_plazas_peq=$request->cant_plazas_peq;
        $parqueo->cant_plazas_medianas=$request->cant_plazas_medianas;
        $parqueo->cant_plazas_grandes=$request->cant_plazas_grandes;
        $total_plazas=$request->cant_plazas_peq+$request->cant_plazas_medianas+$request->cant_plazas_grandes;
        $parqueo->cant_plazas_total=$total_plazas;
        $parqueo->save();

        //variable nombre que va ser comun en el estacionamento y cola nombre del parqueo
        //$nombre=$parqueo->nombre;

        //creando una cola nueva luego de crear un parqueo 
        $cola= new cola();
        $cola->vehiculo_id=0;
        $cola->parqueo_nombre=$request->nombre;
        $cola->save();

        //creando un nuevo estacionamiento
        $estacionamiento= new estacionamiento();
        $estacionamiento->parqueo_id=$request->nombre;
        $estacionamiento->vehiculo_id=0;
        $estacionamiento->vehiculo_tipo=0;
        $estacionamiento->disponibilidad_total=$request->cant_plazas_peq+$request->cant_plazas_medianas+$request->cant_plazas_grandes;
        $estacionamiento->disponibilidad_peq=$request->cant_plazas_peq;
        $estacionamiento->disponibilidad_mediana=$request->cant_plazas_medianas;
        $estacionamiento->disponibilidad_grande=$request->cant_plazas_grandes;
        $estacionamiento->save();


        return redirect()->route('p_inicio');
        //return view("inicio", compact('cola'), compact('estacionamiento','parqueo'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listarParqueo()
    {
        //guardar la coleccion de la estacionamiento y pasarlo a la vista lista_estacionados
        $estacionamiento=estacionamiento::paginate(10);
        return view("lista_estacionados", compact("estacionamiento"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
