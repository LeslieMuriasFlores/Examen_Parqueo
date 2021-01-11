<?php

namespace App\Http\Controllers;

use App\Models\parqueo;
use Illuminate\Http\Request;
use App\Models\cola;
use App\Models\estacionamiento;
use App\Models\vehiculo;
use GuzzleHttp\Psr7\Message;

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

    public function showinfo($elemento)
    {
        //

        $cola=cola::all();
        return view('notificar', compact('cola'), $elemento);

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
        $cola->vehiculo_tipo=0;
        $cola->parqueo_nombre=$request->nombre;
        $cola->save();

        //creando un nuevo estacionamiento
        $estacionamiento= new estacionamiento();
        $estacionamiento->parqueo_id=$request->nombre;
        $estacionamiento->vehiculo_id=0;
        $estacionamiento->vehiculo_tipo=0;
        $estacionamiento->plaza_ocupada='null';
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
    public function liberarCampo()
    {
        //eliminar un vehiculo aleatoriamente del estacionamiento
        $estacionamiento=estacionamiento::all();
        $cant_estacionados=$estacionamiento->count();
        $aleatorio=rand(1,$cant_estacionados-1);
        
        foreach($estacionamiento as $item){
            if($aleatorio==0){
               $elemento=$item;
            }
            $aleatorio--;
        }
        //antes de eliminar el registro obtener que palza ocupaba en el estacionamiento
        $plaza_ocupada=$elemento->plaza_ocupada;
        $elemento->delete();
         
        //actualizando ultimo registro en estacionamiento
        $ultimo_registro=estacionamiento::orderBy('id_estacionamiento', 'desc')->first();
        $ultimo_registro->parqueo_id=$ultimo_registro->parqueo_id;
        $ultimo_registro->vehiculo_id=$ultimo_registro->vehiculo_id;
        $ultimo_registro->vehiculo_tipo=$ultimo_registro->vehiculo_tipo;
        $ultimo_registro->plaza_ocupada=$ultimo_registro->plaza_ocupada;
        if($plaza_ocupada=='peq'){
            $ultimo_registro->disponibilidad_peq=$ultimo_registro->disponibilidad_peq+1;
            $ultimo_registro->disponibilidad_mediana=$ultimo_registro->disponibilidad_mediana;
            $ultimo_registro->disponibilidad_grande=$ultimo_registro->disponibilidad_grande;
            $ultimo_registro->disponibilidad_total=$ultimo_registro->disponibilidad_total+1;
        }elseif($plaza_ocupada=='mediana'){
            $ultimo_registro->disponibilidad_peq=$ultimo_registro->disponibilidad_peq;
            $ultimo_registro->disponibilidad_mediana=$ultimo_registro->disponibilidad_mediana+1;
            $ultimo_registro->disponibilidad_grande=$ultimo_registro->disponibilidad_grande;
            $ultimo_registro->disponibilidad_total=$ultimo_registro->disponibilidad_total+1;
        }elseif($plaza_ocupada=='grande'){
            $ultimo_registro->disponibilidad_peq=$ultimo_registro->disponibilidad_peq;
            $ultimo_registro->disponibilidad_mediana=$ultimo_registro->disponibilidad_mediana;
            $ultimo_registro->disponibilidad_grande=$ultimo_registro->disponibilidad_grande+1;
            $ultimo_registro->disponibilidad_total=$ultimo_registro->disponibilidad_total+1;
        }
        
        $ultimo_registro->save();


        //gestionando la cola
        $cola=cola::all();
        $cant_esperando=$cola->count();
        if($cant_esperando>0){
            //eliminandoel primer elemento de encontarse aun en la cola debido a q id_vehiculo es null
            foreach($cola as $item){
                if($item->vehiculo_id==0){
                    $item->delete();
                }                    
            }

            $primero_cola=cola::all()->first();
            if($primero_cola->vehiculo_tipo=='moto'){
                app(VehiculoController::class)->pasarmoto();

            }elseif($primero_cola->vehiculo_tipo=='carro'){
                app(VehiculoController::class)->pasarcarro();

            }elseif($primero_cola->vehiculo_tipo=='camion'){
                app(VehiculoController::class)->pasarcamion(); 
            }
         

        }
        return redirect()->route('p_inicio');
        

    }

}
