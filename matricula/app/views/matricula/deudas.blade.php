@extends('matricula/layout')

@section('title')
Selección de estudiante
@stop

@section('css')
@parent
@stop


@section('color-panel')
danger
@stop

@section('titulo-panel')
Deuda de estudiante
@stop

@section('cuerpo-panel')
<p><strong>Nombre:</strong> {{$estudiante->nombres}} </p>
<p><strong>Apellidos:</strong> {{$estudiante->appaterno}} {{$estudiante->apmaterno}} </p>
<p>Para poder matricularse debe regularizar los pagos de los siguientes meses:</p>
@stop
@section('formularios')



<table class="table table-hover" style="font-size:1.1em;">
	<tr>
		<th>Año</th>
		<th>Mes</th>
	</tr>
	@foreach($deudas as $deuda)
	<tr>
		<td>{{$deuda->anio}}</td>
		<td>{{$deuda->mes}}</td>
	</tr>
	@endforeach
</table>

@stop