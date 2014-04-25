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
	<li><a href="">2. Ingresar numero de operacion</a></li>
	<li><a href="">3. Ficha de matrícula</a></li>
	<li><a href="" class="active">4. Compromiso</a></li>
</ul>
@stop

@section('color-panel')
success
@stop

@section('titulo-panel')
ALUMNA MATRICULADA
@stop

@section('cuerpo-panel')
<p>La alumna {{$estudiante->nombres}} {{$estudiante->appaterno}} {{$estudiante->apmaterno}} se encuentra en el sistema, a la espera de la confirmación de los datos enviados, en un plazo de 24 horas como máximo. El último paso será la entrega, por parte del apoderado, del Compromiso con el Colegio. que estará disponible cuando dichos datos se hayan confirmado.</p>
@stop

@stop