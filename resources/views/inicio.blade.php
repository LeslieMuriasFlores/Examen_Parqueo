@extends("layouts.plantilla")

@section("titulo", "Principal")

@section("contenido")
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="{{asset('img/flan1.jpg')}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Flan napolitano</h5>
        <p class="card-text">
        Un básico de la cocina mexicana.
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{asset('img/flan5.jfif')}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Flan de coco </h5>
        <p class="card-text">Un postre clásico y original. </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{asset('img/flan4.jpg')}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Flan de café</h5>
        <p class="card-text">Para los amantes del café, un aroma espectacular.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="{{asset('img/flan3.jfif')}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Flan de chocolate</h5>
        <p class="card-text"> Postre latino de textura suave y sabor intenso.</p>
      </div>
    </div>
  </div>
</div>
@endsection




