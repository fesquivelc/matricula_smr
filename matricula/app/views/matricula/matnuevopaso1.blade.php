@extends('matricula/layout')

@section('title')
Selección de estudiante
@stop

@section('css')
@parent
@stop

@section('pasos')
<ul class="nav nav-pills">
  <li class="active"><a href="#">1. Seleccionar alumno</a></li>
  <li><a href="#">2. Ingresar numero de operacion</a></li>
  <li><a href="#">3. Ficha de matrícula</a></li>
</ul>
@stop

@section('instrucciones')
<p>A continuación se muestran los alumnos de los que es apoderado. Debe tener en cuenta que sólo pueden matricularse aquellos estudiantes que estén al día en sus pagos.</p>
@stop

@section('formularios')

@stop