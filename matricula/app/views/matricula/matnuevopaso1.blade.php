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
		<th>Matricular</th>
	</tr>
	<tr>
		<td>Francis Esquivel</td>
		<td>Secundaria</td>
		<td>4</td>
		<td><a href="/paso2/" class="btn btn-primary btn-sm" role="button">Matricular</a></td>
	</tr>
	<tr>
		<td>Nombre2 Apellidos2</td>
		<td>Secundaria</td>
		<td>5</td>
		<td><a href="/paso2/" class="btn btn-danger btn-sm" role="button">Ver deudas</a></td>
	</tr>
	<tr>
		<td>Nombre3 Apellidos3</td>
		<td>Secundaria</td>
		<td>5</td>
		<td><a href="/paso2/" class="btn btn-info disabled btn-sm" role="button">En espera...</a></td>
	</tr>
	<tr>
		<td>Nombre4 Apellidos4</td>
		<td>Secundaria</td>
		<td>5</td>
		<td><a href="/paso2/" class="btn btn-success disabled btn-sm" role="button">Matriculado</a></td>
	</tr>
</table>

@stop