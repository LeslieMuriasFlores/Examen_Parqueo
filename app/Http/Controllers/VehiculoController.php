<?php

namespace App\Http\Controllers;

use App\Models\estacionamiento;
use App\Models\parqueo;
use App\Models\vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{


    public function addvehiculo(Request $request){
        $vehiculo=new vehiculo();
        


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmoto()
    {
        //add moto

        $vehiculo=new vehiculo();
        $vehiculo->tipo_vehiculo="moto";
        $vehiculo->save();

        $ultimo_registro=estacionamiento::orderBy('id_estacionamiento', 'desc')->first();
        
        $ultimo_vehiculo=vehiculo::orderBy('id_vehiculo', 'desc')->first();

        $ultimo_parqueo=parqueo::orderBy('id_parqueo', 'desc')->first();
        
        if($ultimo_registro->disponibilidad_peq>0){      
            $estacionamiento= new estacionamiento();
            $estacionamiento->parqueo_id=$ultimo_parqueo->nombre;
            $estacionamiento->vehiculo_id=$ultimo_vehiculo->id_vehiculo;
            $estacionamiento->vehiculo_tipo=$ultimo_vehiculo->tipo_vehiculo;
            $estacionamiento->disponibilidad_total=$ultimo_registro->disponibilidad_total-1;
            $estacionamiento->disponibilidad_peq=$ultimo_registro->disponibilidad_peq-1;
            $estacionamiento->disponibilidad_mediana=$ultimo_registro->disponibilidad_mediana;
            $estacionamiento->disponibilidad_grande=$ultimo_registro->disponibilidad_grande;
            $estacionamiento->save();

            return redirect()->route('p_inicio');

        }elseif($ultimo_registro->disponibilidad_mediana>0){
            //$this->addcarro
            /*$estacionamiento= new estacionamiento();
            $estacionamiento->parqueo_id=$ultimo_parqueo->nombre;
            $estacionamiento->vehiculo_id=$ultimo_vehiculo->id_vehiculo;
            $estacionamiento->vehiculo_tipo=$ultimo_vehiculo->tipo_vehiculo;
            $estacionamiento->disponibilidad_total=$ultimo_registro->disponibilidad_total-1;
            $estacionamiento->disponibilidad_peq=$ultimo_registro->disponibilidad_peq;
            $estacionamiento->disponibilidad_mediana=$ultimo_registro->disponibilidad_mediana-1;
            $estacionamiento->disponibilidad_grande=$ultimo_registro->disponibilidad_grande;
            $estacionamiento->save();

            return redirect()->route('p_inicio');*/

        }elseif($ultimo_registro->disponibilidad_grande>0){
            $estacionamiento= new estacionamiento();
            $estacionamiento->parqueo_id=$ultimo_parqueo->nombre;
            $estacionamiento->vehiculo_id=$ultimo_vehiculo->id_vehiculo;
            $estacionamiento->vehiculo_tipo=$ultimo_vehiculo->tipo_vehiculo;
            $estacionamiento->disponibilidad_total=$ultimo_registro->disponibilidad_total-1;
            $estacionamiento->disponibilidad_peq=$ultimo_registro->disponibilidad_peq;
            $estacionamiento->disponibilidad_mediana=$ultimo_registro->disponibilidad_mediana;
            $estacionamiento->disponibilidad_grande=$ultimo_registro->disponibilidad_grande-1;
            $estacionamiento->save();

            return redirect()->route('p_inicio');

        }
        

      


    }

    public function addcarro()
    {
        //add carro
        
        $vehiculo=new vehiculo();
        $vehiculo->tipo_vehiculo="carro";
        $vehiculo->save();




    }

    public function addcamion()
    {
        //add camion
        $vehiculo=new vehiculo();
        $vehiculo->tipo_vehiculo="camion";
        $vehiculo->save();


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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
