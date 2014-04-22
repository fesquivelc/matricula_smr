@extends('matricula/layout')

@section('title')
Selección de estudiante
@stop

@section('css')
@parent
@stop

@section('pasos')
<ul class="nav nav-pills">
  <li class="active"><a href="">1. Seleccionar alumno</a></li>
  <li><a href="">2. Ingresar numero de operacion</a></li>
  <li><a href="">3. Ficha de matrícula</a></li>
</ul>
@stop

@section('instrucciones')
<p>A continuación se muestran los alumnos de los que es apoderado. Debe tener en cuenta que sólo pueden matricularse aquellos estudiantes que estén al día en sus pagos.</p>


@stop

@section('formularios')
<table class="table table-hover" style="font-size:1.1em;">
	<tr>
		<th>Nombre</th>
		<th>Nivel</th>
		<th>Grado</th>
		<th></th>
	</tr>
	
	@foreach ($estudiantes as $estudiante)
	<tr>
		<td> {{$estudiante->appaterno;}} {{$estudiante->apmaterno;}} {{$estudiante->nombres;}}</td>
		<td> {{$estudiante->ficha}} </td>
		<td></td>
		<td>
			@if($estudiante->estado == 'N')
				<a href="{{url('/deudas/'.$estudiante->dni)}}" class="btn btn-danger btn-sm" role="button">Ver deudas</a>
			@elseif($estudiante->estado == 'S')
				<a href="{{url('/paso2/'.$estudiante->dni)}}" class="btn btn-primary btn-sm" role="button">Matricular</a>
			@endif
		</td>
	</tr>
	@endforeach
</table>

@stop