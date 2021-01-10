@extends("layouts.plantilla")
@section("titulo", "Lista de espera")

@section("barra")
<a class="navbar-brand" href="{{route('p_inicio')}}">
  <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">
  Home
</a>
@endsection


@section("contenido")

<table class="table table-striped table-hover">
    <tr>
        <td>Identificador_cola</td>
        <td>Identificador_vehiculo</td>
        <td>Nombre_parqueo</td>
    </tr>
    @foreach ($coleccion as $item)
    <tr>
        <td>{{$item->id_cola}}</td>
        <td>{{$item->vehiculo_id}}</td>
        <td>{{$item->parqueo_nombre}}</td>
    </tr>  
    @endforeach
</table>
<div class="d-flex justify-content-center">
{!! $coleccion->links() !!}
</div>
@endsection


