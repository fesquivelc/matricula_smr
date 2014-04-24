@extends('administracion/layout')

@section('title')
Sistema de Matricula SMR
@stop


@section('pasos')
Ingresa nuevo año
@stop

@section('pasos')
Cronograma de matricula y seguros
@stop


	@section('formularios')

		<div style="max-width:500px;margin-left:auto;margin-right:auto;">
		{{Form::open(array('url'=>'/nuevocronograma'))}}

		<legend>Registro cronograma de matrícula</legend>
		
		<div class="form-group">
			{{Form::text('ffinicio',  Input::old('ffinicio'), array('class' => 'form-control input-lg','placeholder' => 'Fecha de Inicio de matricula: ej.(2014-04-10)'))}}
				<span class="add-on"><i class="icon-calendar"></i></span>
		</div>

		<div class="form-group">
			{{Form::text('ffin',  Input::old('ffin'), array('class' => 'form-control input-lg','placeholder' => 	'Fecha de Fin de matrículas: ej.(2014-12-20)'))}}
					<span class="add-on"><i class="icon-calendar"></i></span>
		</div>

		<legend>Registro cronograma de seguro</legend>
		
		<div class="form-group">
			{{Form::text('finicioseguro',  Input::old('finicioseguro'), array('class' => 'form-control input-lg','placeholder' => 'Fecha de Inicio de seguros: ej.(2014-04-10)'))}}
				<span class="add-on"><i class="icon-calendar"></i></span>
		</div>

		<div class="form-group">
			{{Form::text('ffinseguro',  Input::old('ffinseguro'), array('class' => 'form-control input-lg','placeholder' => 	'Fecha de Fin de seguros: ej.(2014-05-10)'))}}
					<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		<div class="form-group">
			{{ Form::submit('Enviar', array('class' => 'btn btn-primary btn-lg btn-block')) }}
			{{Form::hidden('anioacademico_id',$anioacademico->id)}}
		{{Form::close()}}	
		</div>
		</div>
	@stop

