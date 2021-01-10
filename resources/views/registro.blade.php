
@extends("layouts.plantilla")

@section("titulo", "registro")


@section("barra")
<h2>Bienvenido</h2>
@endsection


@section("contenido")
<div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <div class="spacing-1"></div>
       
        <legend>To create a new parking lot please enter the following data</legend>
        
        <form  method="POST" action="{{route('p_crearparqueo')}}">
          @csrf
            <label class="sr-only" for="user">Name</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="nombre" placeholder="Parking" required>
            </div>
            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <label class="sr-only" for="user">Small vehicles capacity</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="number" class="form-control" name="cant_plazas_peq" placeholder="Small" required>
            </div>
            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <label class="sr-only" for="user">Medium vehicle capacity</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="number" class="form-control" name="cant_plazas_medianas" placeholder="Medium" required>
            </div>
            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <label class="sr-only" for="user">Large vehicle capacity</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="number" class="form-control" name="cant_plazas_grandes" placeholder="Large" required>
            </div>
            <!-- Div espaciador -->
            <div class="spacing-2"></div>
      
            <div>
                <button type="submit" class="btn btn-primary btn-block"  name="registro" id="registro">Les't go !!</button>
            </div>
              




         
        </form>
      </div>
    <div class="col-xs-12 col-md-4 col-md-offset-4"><h2>Poner una imagen aki</h2></div>
    <div class="col-xs-12 col-md-4 col-md-offset-4"><h5>Listado de estacionamientos </h5>
    <table>
    <tr><td>ID</td>   
      <td>Nombre</td>   
      <td>Capacidad</td>  
    </tr>
    @foreach ($parqueos as $item)
    <tr><td>{{$item->id_parqueo}}</td> 
      <td>{{$item->nombre}}</td> 
      <td>{{$item->cant_plazas_total}}</td> 
    </tr>
    @endforeach
    </table>
    <div class="d-flex justify-content-center">
      {!! $parqueos->links() !!}
    </div>
  
    </div>
    </div>
</div>  
@endsection