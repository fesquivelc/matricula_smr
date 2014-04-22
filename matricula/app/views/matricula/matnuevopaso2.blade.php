@extends('matricula/layout')

@section('title')
Selección de estudiante
@stop

@section('css')
@parent
@stop

@section('pasos')
<ul class="nav nav-pills">
  <li><a href="#">1. Seleccionar alumno</a></li>
  <li class="active"><a href="#">2. Ingresar numero de operacion</a></li>
  <li><a href="#">3. Ficha de matrícula</a></li>
</ul>
@stop

@section('instrucciones')
<p>Ingrese el número de operación que se encuentra en el voucher otorgado por el Banco de Crédito</p>
@stop

@section('formularios')

@stop