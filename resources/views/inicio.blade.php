@extends("layouts.plantilla")

@section("titulo", "Principal")

@section("barra")
<a class="navbar-brand" href="{{route('p_inicio')}}">
  <img src="{{url('img/logo2.png')}}" alt="" width="100" height="50" class="d-inline-block align-top">
Inicio
</a>
@endsection
    

@section("contenido")


<h3><p class="text-center" style="margin-top: 2%">Bienvenidos al parqueo : 
  @foreach ($parqueo as $item)
  {{$item->nombre}}
  @endforeach</p></h3>



<div class="card-group" style="margin-top: 2%">
  <div class="card">
    <img src="{{url('img/moto.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Motocicletas</h5>
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
 <p>Motos en estacionamiento:</p>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:  @foreach ($parqueo as $item)
          {{round($cont2/$item->cant_plazas_total*100)}}%
        @endforeach"aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
          {{round($cont2/$item->cant_plazas_total*100)}}%       
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <img src="{{url('img/carro.png')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Autos</h5>
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
 <p>Autos en estacionamiento:</p>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:  @foreach ($parqueo as $item)
        {{round($cont3/$item->cant_plazas_total*100)}}%
        @endforeach" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> @foreach ($parqueo as $item)
  {{round($cont3/$item->cant_plazas_total*100)}}%
  @endforeach
</div>
      </div>
    </div>
  </div>
  <div class="card">
    <img src="{{url('img/camion1.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Camiones</h5>
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
    <p>Camiones en estacionamiento:</p>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:     @foreach ($parqueo as $item)
        {{round($cont4/$item->cant_plazas_total*100)}}%
        @endforeach" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">    @foreach ($parqueo as $item)
    {{round($cont4/$item->cant_plazas_total*100)}}%
    @endforeach
  </div>
      </div>
    </div>
  </div>
</div>

 
 <!-- Estado del parqueo -->
 <footer class="bg-light text-center text-lg-start"  style="margin-top: 2%">
 
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    Estado del estacionamiento
@php
$cont1=0
@endphp
    @foreach ($estacionamiento as $item)
      @if ($item['vehiculo_id']>0)
           <!--{{$cont1++}}-->
      @endif
   @endforeach 
   {{$cont1}}: Vehículos
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

 <!-- liberar campo estacionamiento -->
 <form method="POST" action="{{route('p_liberar')}}">
  @csrf     
    <div class="text-center" style="margin-top: 2%">
  <button type="submit" class="btn btn-primary btn-block" >Liberar campo en estacionamiento</button>
    </div>
 </form>

 <!-- Estado de la cola -->
<footer class="bg-light text-center text-lg-start"  style="margin-top: 2%">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    Lista de espera 
    @php
    $cont=0
    @endphp
    @foreach ($cola as $item)
      @if ($item['vehiculo_id']>0)
           <!-- {{$cont++}}-->
      @endif
   @endforeach 
    {{$cont}}: Vehículos
    <a class="text-dark" href="{{route('p_listar_cola')}}"><h5>Información de la fila</h5></a>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: {{$cont}}%">
        {{$cont}}%
      </div>
    </div>
  </div>
</footer>

@endsection




