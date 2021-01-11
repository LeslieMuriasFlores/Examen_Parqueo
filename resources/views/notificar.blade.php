
@extends("layouts.plantilla")
@section("titulo", "Notificar")

@section("barra")
<a class="navbar-brand" href="{{route('p_inicio')}}">
  <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">
  Inicio
</a>
@endsection
@section("contenido")
<div>
    <p>
        <h3>Se ha liberado un espacio en el estacionamiento</h3><br>
        <h5>El vehiculo saliente posee identificador: {{$elemento->vehiculo_id}}<br></h5>
        <h5>El vehiculo es de tipo: {{$elemento->vehiculo_tipo}}<br></h5>
        <h5>El vehiculo ocupaba una plaza en estacionamiento de tipo: {{$elemento->plaza_ocupada}}<br></h5>
    </p>
</div>

<div>
    
    
     <!--comentario-->
    <p>
    <h3>El próximo vehiculo en la cola es un: {{$elemento->vehiculo_tipo}}</h3><br>  
    <h3>Podrá acceder al estacionamiento de inmediato de existir disponibilidad</h3><br>  
    
    </p>
</div>
@endsection

