@extends('layout2')
@section ('content')
@if($name== 'Aldo Jamanca' or $name == 'Alvaro Jamanca')
<h1>Hola Señor Jamanca</h1>
@else	
<h1>Hello {{$name}} </h1>
@endif