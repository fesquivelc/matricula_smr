<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesión</title>
	{{ HTML::style('assets/css/bootstrap.min.normal.css', array('media' => 'screen')) }}
</head>
<body>
	<h1>Colegio Privado "Santa María Reina"</h1>
	<h2>Sistema de matrículas online</h2>
	<hr>
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Active</a></li>
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Dropdown header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-left">
				<input class="form-control col-lg-8" placeholder="Search" type="text">
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="container" style="max-width:600px;margin-top:2%">
		
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	{{ HTML::script('assets/js/bootstrap.min.js') }}

</body>
</html>