@extends('matricula/layout')

@section('title')
Selección de estudiante
@stop

@section('css')
@parent
@stop

@section('pasos')
<ul class="nav nav-pills">
	<li><a href="">1. Seleccionar alumno</a></li>
	<li class="active"><a href="">2. Ingresar numero de operacion</a></li>
	<li><a href="">3. Datos de estudiante</a></li>
	<li><a href="">4. Compromiso</a></li>
</ul>
@stop

@section('color-panel')
primary
@stop

@section('titulo-panel')
Instrucciones
@stop

@section('cuerpo-panel')
<p>A continuación digite el código de la operación bancaria de la matrícula.</p>
<p><strong>DNI:</strong> {{$estudiante->dni}} </p>
<p><strong>Nombres:</strong> {{$estudiante->nombres}} </p>
<p><strong>Apellidos:</strong> {{$estudiante->appaterno}} {{$estudiante->apmaterno}} </p>
<p><strong>Nivel:</strong> {{$grado->nivel->nombre}}</p>
<p><strong>Grado:</strong> {{$grado->descripcion}}</p>
@stop

@section('formularios')
<div style="max-width:500px;margin-left:auto;margin-right:auto;">
	{{Form::open(array('url'=>'/paso2'))}}
	<legend>Número de operación</legend>
	<div class="form-group">

		{{ Form::text('operacion', Input::old('operacion'), array('class' => 'form-control input-lg', 'placeholder' => 'Numero de operacion')) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Enviar', array('class' => 'btn btn-primary btn-lg btn-block')) }}
	</div>

	{{Form::hidden('dni', $estudiante->dni)}}

	{{Form::close()}}
</div>
@stop