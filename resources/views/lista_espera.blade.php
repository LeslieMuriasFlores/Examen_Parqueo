@extends("layouts.plantilla")
@section("titulo", "Lista de espera")

@section("barra")
<a class="navbar-brand" href="{{route('p_inicio')}}">
    <img src="{{url('img/logo2.png')}}" alt="" width="100" height="50" class="d-inline-block align-top">
    Inicio
  </a>
@endsection


@section("contenido")
<h3><p class="text-center" style="margin-top: 2%">Infomación actual de la lista de espera</p></h3>
<table class="table table-striped table-hover"  style="margin-top: 2%">
    <tr>
        <td>Identificador_cola</td>
        <td>Identificador_vehiculo</td>
        <td>Tipo_vehiculo</td>
        <td>Nombre_parqueo</td>
    </tr>
    @foreach ($coleccion as $item)
    <tr>
        <td>{{$item->id_cola}}</td>
        <td>{{$item->vehiculo_id}}</td>
        <td>{{$item->vehiculo_tipo}}</td>
        <td>{{$item->parqueo_nombre}}</td>
    </tr>  
    @endforeach
</table>
<div class="d-flex justify-content-center">
{!! $coleccion->links() !!}
</div>
@endsection


