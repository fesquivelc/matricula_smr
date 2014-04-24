<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title','Sistema de matrícula online') </title>
  @section('css')
  <!-- Bootstrap -->
  {{ HTML::style('assets/css/bootstrap.min.yeti.css', array('media' => 'screen')) }}
  {{ HTML::style('assets/css/datepicker.css')}}
  
  @show

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>



      <div class="container">
        <h1>Colegio Privado Santa María Reina</h1>
        <h2>Sistema de matrículas online </h2>

        <hr>

        <div class="navbar navbar-inverse">
          <div class="navbar-header">
            <a class="navbar-brand" href="" > @yield('tipo-control') </a>
          </div>
          <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{url('/logout')}}">Cerrar sesión</a></li>            
            </ul>
          </div>
          
        </div>

        @yield('pasos')

        <hr>
        <div class="panel panel-@yield('color-panel')">
          <!-- Default panel contents -->
          <div class="panel-heading"> @yield('titulo-panel') </div>
          <div class="panel-body">
            <p> @yield('cuerpo-panel') </p>
            @yield('menu')
          </div>
           
        </div>
        @yield('formularios')

      </div>
      
      @section('javascript')
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->    
      {{ HTML::script('assets/js/jquery.min.js') }}
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      {{ HTML::script('assets/js/bootstrap.min.js') }}
      {{ HTML::script('assets/js/bootstrap-datepicker.js') }}
      @show
    </body>
    </html>

