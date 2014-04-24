@extends('administracion/layout')
@section('title')
Sistema de Matricula SMR
@stop

@section('tipo-control')
Opciones de control
@stop

@section('menu')

	<li><a href="#" class="btn btn-danger btn-sm" role="button">Año Academico</a></li>
	<li><a href="{{url('/cronograma')}}" class="btn btn-danger btn-sm" role="button">Cronograma</a></li>
	<li><a href="#" class="btn btn-danger btn-sm" role="button">Control de Secciones, Grados y Niveles</a></li>
	<li><a href="{{url('/estudiantes')}}" class="btn btn-danger btn-sm" role="button">Alumnado</a></li>

@stop
