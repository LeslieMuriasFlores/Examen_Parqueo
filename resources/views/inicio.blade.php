@extends("layouts.plantilla")

@section("titulo", "Principal")

@section("barra")
<a class="navbar-brand" href="{{route('p_inicio')}}">
  <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">
  Home
</a>
@endsection
    

@section("contenido")


<h2><p class="text-center">Welcome to the parking lot: 
  @foreach ($parqueo as $item)
  {{$item->nombre}}
  @endforeach</p></h2>



<div class="card-group">
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Motorcycle</h5>
      <form method="POST" action="{{route('p_addmoto')}}">
        @csrf
      <p class="card-text">       
          <div>
        <button type="submit" class="btn btn-primary btn-block" >Seleccionar</button>
          </div>
      </p>
    </form>
    
    <!--Estado del estacionamiento de motos-->
@php
$cont2=0
@endphp
 @foreach ($estacionamiento as $item)
     @if ($item->vehiculo_tipo=='moto')
          <!--{{$cont2++}}-->
     @endif
 @endforeach
 <p>Plazas pequeñas ocupadas:</p>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:  @foreach ($parqueo as $item)
          {{$cont2/$item->cant_plazas_peq*100}}%
        @endforeach" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
        @foreach ($parqueo as $item)
          {{$cont2/$item->cant_plazas_peq*100}}%
        @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Sedan</h5>
      <form method="POST" action="{{route('p_addcarro')}}">
        @csrf
      <p class="card-text">
        <div>
      <button type="submit" class="btn btn-primary btn-block" >Seleccionar</button>
        </div>
      </p>
    </form>

     <!--Estado del estacionamiento de carros-->
@php
$cont3=0
@endphp
     @foreach ($estacionamiento as $item)
     @if ($item->vehiculo_tipo=='carro')
          <!--{{$cont3++}}-->
     @endif
    @endforeach
 <p>Plazas medianas ocupadas:</p>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:  @foreach ($parqueo as $item)
        {{$cont3/$item->cant_plazas_medianas*100}}
        @endforeach" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> @foreach ($parqueo as $item)
  {{$cont2/$item->cant_plazas_medianas*100}}
  @endforeach
</div>
      </div>
    </div>
  </div>
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Truck</h5>
      <form method="POST" action="{{route('p_addcamion')}}">
        @csrf
      <p class="card-text">
          <div>
        <button type="submit" class="btn btn-primary btn-block" >Seleccionar</button>
          </div>
      </p>
    </form>
    <!--Estado del estacionamiento de camiones-->
@php
$cont4=0
@endphp
    @foreach ($estacionamiento as $item)
    @if ($item->vehiculo_tipo=='camion')
         <!--{{$cont4++}}-->
    @endif
    @endforeach
    <p>Plazas grandes ocupadas:</p>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:     @foreach ($parqueo as $item)
        {{$cont4/$item->cant_plazas_grandes*100}}
        @endforeach" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">    @foreach ($parqueo as $item)
    {{$cont4/$item->cant_plazas_grandes*100}}
    @endforeach
  </div>
      </div>
    </div>
  </div>
</div>

 <!-- Estado del parqueo -->
 <footer class="bg-light text-center text-lg-start">
 
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
   
    <p>Estado del estacionamiento:</p> 
@php
$cont1=0
@endphp
    @foreach ($estacionamiento as $item)
      @if ($item['vehiculo_id']>0)
           <!--{{$cont1++}}-->
      @endif
   @endforeach 
   {{$cont1}}
    <a class="text-dark" href="{{route('p_listarparqueo')}}"><h5>Información del estacionamiento</h5></a>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: @foreach ($parqueo as $item)
      {{round($cont1/$item->cant_plazas_total*100)}}%@endforeach">
        @foreach ($parqueo as $item)
        {{round($cont1/$item->cant_plazas_total*100)}}%
        @endforeach
      </div>
    </div>
  </div>
</footer>


 <!-- Estado de la cola -->
<footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    Lista de espera : 
    @php
    $cont=0
    @endphp
    @foreach ($cola as $item)
      @if ($item['vehiculo_id']>0)
          {{$cont++}}
      @endif
   @endforeach 
    {{$cont}}
    <a class="text-dark" href="{{route('p_listar_cola')}}"><h5>Información de la fila</h5></a>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: {{$cont}}%">
        {{$cont}}%
      </div>
    </div>
  </div>
</footer>

@endsection




