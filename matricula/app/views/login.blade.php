<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesión</title>
	{{ HTML::style('assets/css/bootstrap.min.yeti.css', array('media' => 'screen')) }}
</head>
<body>
	
	
	<div class="container" >
		
		<h1>Colegio Privado "Santa María Reina"</h1>
		<h2>Sistema de matrículas online</h2>
		<h3>Año académico: {{date('Y')}}</h3>
		<hr>
		<div style="max-width:600px;margin-top:2%;margin-left:auto;margin-right:auto;">
			<div class="panel panel-info">
				<div class="panel-body">
					{{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
					@if(Session::has('mensaje_error'))
					<div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
					@endif
					{{ Form::open(array('url' => '/login', 'class' => 'form col-md-12 center-block')) }}
					<legend>Iniciar sesión</legend>
					<div class="form-group">
						<!-- {{ Form::label('usuario', 'Nombre de usuario') }} -->
						{{ Form::text('username', Input::old('username'), array('class' => 'form-control input-lg', 'placeholder' => 'Usuario')); }}
					</div>
					<div class="form-group">
						<!-- {{ Form::label('contraseña', 'Contraseña') }} -->
						{{ Form::password('password', array('class' => 'form-control input-lg', 'placeholder' => 'Contraseña')); }}
					</div>
					<div class="form-group">
						{{ Form::submit('Ingresar', array('class' => 'btn btn-primary btn-lg btn-block')) }}
					</div>
					<div class="form-group">
						{{ Form::submit('Nuevo estudiante', array('class' => 'btn btn-info btn-lg btn-block')) }}
					</div>                        

					{{ Form::close() }}
				</div>
			</div>		
		</div>
		
	</div>	
	{{ HTML::script('assets/js/jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}

</body>
</html>