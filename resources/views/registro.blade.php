
@extends("layouts.plantilla")

@section("titulo", "Registro")


@section("barra")
<h2>Bienvenido</h2>
@endsection
@section("contenido")
<div class="container h-100" style="margin-top: 2%">
  <div class="row justify-content-center h-100">
      <div class="col-sm-8 align-self-center text-center">
          <div class="card shadow">
              <div class="card-body">           
                <legend>Configure los datos iniciales de su parqueo</legend>
                <form  method="POST" action="{{route('p_crearparqueo')}}">
                  @csrf
                      <div class="input-group-addon"><i class="">Nombre:</i></div> 
                      <input type="text" class="form-control" name="nombre" placeholder="Nombre del parqueo" required >
                    <!-- Div espaciador -->
                    <div class="spacing-2"></div>
                      <div class="input-group-addon"><i class="">Capacidad de vehiculos pequeños:</i></div>
                      <input type="number" class="form-control" name="cant_plazas_peq" placeholder="Puestos pequeños" required>
                    <!-- Div espaciador -->
                    <div class="spacing-2"></div>
                      <div class="input-group-addon"><i class="">Capacidad de vehiculos medianos:</i></div>
                      <input type="number" class="form-control" name="cant_plazas_medianas" placeholder="Puestos medianos"  required>
                    <!-- Div espaciador -->
                    <div class="spacing-2"></div>
                      <div class="input-group-addon"><i class="">Capacidad de vehiculos grandes:</i></div>
                      <input type="number" class="form-control" name="cant_plazas_grandes" placeholder="Puestos grandes" required>            
                    <!-- Div espaciador -->
                    <div class="spacing-2"></div>      
                    <div>
                        <button type="submit" class="btn btn-primary btn-block"  name="registro" id="registro" style="margin-top: 2%">Guardar</button>
                    </div>
                </form>                 
              </div>
          </div>
      </div>
  </div>
</div>    
@endsection