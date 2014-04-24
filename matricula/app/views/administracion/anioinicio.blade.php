@extends('administracion/layout')

@section('title')
Sistema de Matricula SMR
@stop

@section('tipo-control')
Cronogramas
@stop

@if(is_null($anioacademico))
@section('pasos')
Ingresa nuevo año
@stop
@else
@section('pasos')
¿Modificiar fechas de inicio y termino de periodo escolar?
@stop
@endif

@if(is_null($anioacademico))
	@section('formularios')

		<div style="max-width:500px;margin-left:auto;margin-right:auto;">
		{{Form::open(array('url'=>'/administracion/anioinicio'))}}

		<legend>Registro nuevo año</legend>
		<div class="form-group">
			{{ Form::text('anio', Input::old('anio'), array('class' => 'form-control input-lg', 'placeholder' => 'Ingrese año:')) }}
		</div>
		<div class="form-group">
			{{Form::text('finicioclases',  Input::old('finicioclases'), array('class' => 'form-control input-lg','placeholder' => 'Fecha de Inicio de clases: ej.(01-04-2014)'))}}
				<span class="add-on"><i class="icon-calendar"></i></span>
		</div>

		<div class="form-group">
			{{Form::text('ffinclases',  Input::old('ffinclases'), array('class' => 'form-control input-lg','placeholder' => 	'Fecha de Fin de clases: ej.(20-12-2014)'))}}
					<span class="add-on"><i class="icon-calendar"></i></span>
		</div>

		<div class="form-group">
			{{ Form::text('denominacion', Input::old('denominacion'), array('class' => 'form-control input-lg', 'placeholder	' => 'Denominación para nuevo año:')) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Enviar', array('class' => 'btn btn-primary btn-lg btn-block')) }}
		{{Form::close()}}	
		</div>
		</div>
	@stop
@else
	@section('cuerpo-panel')
	<tr>
	<td>	
	<p><strong>Año</strong>{{$anioacademico->anio}} </p>
	<p><strong>Fecha de inicio:</strong> {{$anioacademico->finicioclases}} </p>
	<p><strong>Fecha de fin:</strong> {{$anioacademico->ffinclases}} </p>
	</td>
	<td></td>
	<td></td>
	<td>
		<a href="{{url('/administracion/anioiniciomod)}}" class="btn btn-danger btn-sm" role="button">Actualizar</a>
	</td>
	</tr>
	{{Form::hidden('idanio', $anioacademico->id)}}
	@stop
@endif