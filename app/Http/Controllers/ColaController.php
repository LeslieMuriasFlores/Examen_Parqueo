<?php

namespace App\Http\Controllers;

use App\Models\cola;
use App\Models\estacionamiento;
use App\Models\parqueo;
use App\Models\vehiculo;
use Illuminate\Http\Request;

class ColaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar 
        $cola=cola::all();
        $estacionamiento=estacionamiento::all();
        $parqueo=parqueo::all();
        return view("inicio", compact("cola"), compact("estacionamiento","parqueo"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //add registro a la  cola
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
    public function listar()
    {
        //guardar la coleccion de la cola y pasarlo a la vista lista_espera
        $coleccion=cola::paginate(10);
        return view("lista_espera", compact("coleccion"));


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
