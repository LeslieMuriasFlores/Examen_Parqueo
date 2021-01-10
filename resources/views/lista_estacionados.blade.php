@extends("layouts.plantilla")
@section("titulo", "Lista estacionados")

@section("barra")
<a class="navbar-brand" href="{{route('p_inicio')}}">
  <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-top">
  Home
</a>
@endsection


@section("contenido")

<table class="table table-striped table-hover">
    <tr>
        <td>ID_estacionamiento</td>
        <td>Nombre_parqueo</td>
        <td>ID_vehiculo</td>
        <td>Disponibilidad_total</td>
        <td>Disponibilidad_peq</td>
        <td>Disponibilidad_mediana</td>
        <td>Disponibilidad_grande</td>

    </tr>
    @foreach ($estacionamiento as $item)
     
            <tr>
                <td>{{$item->id_estacionamiento}}</td>
                <td>{{$item->parqueo_id}}</td>
                <td>{{$item->vehiculo_id}}</td>
                <td>{{$item->disponibilidad_total}}</td>
                <td>{{$item->disponibilidad_peq}}</td>
                <td>{{$item->disponibilidad_mediana}}</td>
                <td>{{$item->disponibilidad_grande}}</td>
        
            </tr> 
      
    @endforeach
</table>

<div class="d-flex justify-content-center">
{!! $estacionamiento->links() !!}
</div>
@endsection
