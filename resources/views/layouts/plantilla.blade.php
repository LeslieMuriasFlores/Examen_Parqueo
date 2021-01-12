<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("titulo")</title>
    <link href="{{asset('img/logo2.png')}}" rel="shortcut icon" type="image/x-icon">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.js')}}"></script>
   
</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      @yield("barra")
    </div>
  </nav>

@yield("contenido")

<footer class="bg-light text-center text-lg-start"  style="margin-top: 2%">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Nombre</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <p>Ing.Leslie Murias Flores</a>
          </li>
        </ul> 
      </div>

      <div class="col-lg-3 col-md-6 mb-3 mb-md-0">
        <h5 class="text-uppercase">Email</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <p>lesliemurias94@gmail.com</a>
          </li>
        </ul> 
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Teléfono</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <p>+506 61461508</p>
          </li>
        </ul> 
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Dirección</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <p>Ipís,San Jose,Costa Rica</p>
          </li>
        </ul>
      </div>
      <!--Grid column-->

  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    Ing.Leslie Murias Flores © 2020 Copyright: Derechos reservados.
  </div>
  <!-- Copyright -->
</footer>

</body>
</html>