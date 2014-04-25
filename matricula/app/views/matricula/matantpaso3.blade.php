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
	<li class="active"><a href="">3. Datos de estudiante</a></li>
	<li><a href="">4. Compromiso</a></li>
</ul>
@stop

@section('color-panel')
primary
@stop

@section('titulo-panel')
Instrucciones
@stop

@section('cuerpo-panel')
<p>Actualice acorde a la realidad del alumno los datos requeridos</p>
<p><strong>DNI:</strong> {{$estudiante->dni}} </p>
<p><strong>Nombres:</strong> {{$estudiante->nombres}} </p>
<p><strong>Apellidos:</strong> {{$estudiante->appaterno}} {{$estudiante->apmaterno}} </p>
<p><strong>Fecha de nacimiento:</strong> {{date('d-m-Y',strtotime($estudiante->fnacimiento))}}</p>
@stop

@section('formularios')
{{Form::open(array('url'=>'/paso3','class'=>'form-horizontal'))}}
@if($padre->vive)
<legend>Datos del padre</legend>
<div class="form-group">
	{{Form::label('padre_dni', 'DNI:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('padre_dni', Input::old('padre_dni') ? Input::old('padre_dni') : $padre->dni,
		array('class'=>'form-control','disabled'))}}
	</div>	
</div>
<div class="form-group">
	{{Form::label('padre_appaterno', 'Apellido paterno:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('padre_appaterno', Input::old('padre_appaterno') ? Input::old('padre_appaterno') : $padre->appaterno,array('class'=>'form-control','disabled'))}}
	</div>	
</div>
<div class="form-group">
	{{Form::label('padre_apmaterno', 'Apellido materno:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('padre_apmaterno', Input::old('padre_apmaterno') ? Input::old('padre_apmaterno') : $padre->apmaterno,array('class'=>'form-control','disabled'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('padre_nombres', 'Nombres:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('padre_nombres', Input::old('padre_nombres') ? Input::old('padre_nombres') : $padre->nombres,array('class'=>'form-control','disabled'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('padre_fnacimiento', 'Fecha de nacimiento:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-2">
		{{Form::text('padre_fnacimiento', Input::old('padre_fnacimiento') ? Input::old('padre_fnacimiento') : date('d-m-Y',strtotime($padre->fnacimiento)),array('class'=>'form-control','disabled'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('padre_vive', 'Vive:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::select('padre_vive', array('1' => 'SI','0'=>'NO'), Input::old('padre_vive') ? Input::old('padre_vive') : $padre->vive, array('class'=>'form-control'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('padre_vcestudiante', '¿Vive con el estudiante?:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::select('padre_vcestudiante', array('1' => 'SI','0'=>'NO'), Input::old('padre_vcestudiante') ? Input::old('padre_vcestudiante') : $padre->pivot->vcestudiante, array('class'=>'form-control'))}}
	</div>
</div>

<div class="form-group">
	{{Form::label('padre_ginstruccion', 'Grado de instrucción:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::select('padre_ginstruccion', array('UI' => 'UNIVERSITARIA INCOMPLETA','UC'=>'UNIVERSITARIA COMPLETA','TC'=>'TECNICA COMPLETA','TI' => 'TECNICA INCOMPLETA','SE' => 'SECUNDARIA'), Input::old('padre_ginstruccion') ? Input::old('padre_ginstruccion') : $padre->ginstruccion, array('class'=>'form-control'))}}
	</div>
</div>

<div class="form-group">
	{{Form::label('padre_ocupacion', 'Ocupacion:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-2">
		{{Form::text('padre_ocupacion', Input::old('padre_ocupacion') ? Input::old('padre_ocupacion') : $padre->ocupacion,array('class'=>'form-control'))}}
	</div>
</div>

<div class="form-group">
	{{Form::label('padre_esapoderado', '¿Es el apoderado?:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::checkbox('padre_esapoderado', 'padre_esapoderado', Input::old('padre_esapoderado') ? Input::old('padre_esapoderado') : $padre->pivot->esapoderado, array('class'=>'form-control','onchange'=>'accion_chk_apoderado()'))}}
	</div>
</div>
@endif

@if($madre->vive)
<legend>Datos de la madre</legend>
<div class="form-group">
	{{Form::label('madre_dni', 'DNI:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('madre_dni', Input::old('madre_dni') ? Input::old('madre_dni') : $madre->dni,array('class'=>'form-control','disabled'))}}
	</div>	
</div>
<div class="form-group">
	{{Form::label('madre_appaterno', 'Apellido paterno:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('madre_appaterno', Input::old('madre_appaterno') ? Input::old('madre_appaterno') : $madre->appaterno,array('class'=>'form-control','disabled'))}}
	</div>	
</div>
<div class="form-group">
	{{Form::label('madre_apmaterno', 'Apellido materno:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('madre_apmaterno', Input::old('madre_apmaterno') ? Input::old('madre_apmaterno') : $madre->apmaterno,array('class'=>'form-control','disabled'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('madre_nombres', 'Nombres:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('madre_nombres', Input::old('madre_nombres') ? Input::old('madre_nombres') : $madre->nombres,array('class'=>'form-control','disabled'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('madre_fnacimiento', 'Fecha de nacimiento:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-2">
		{{Form::text('madre_fnacimiento', Input::old('madre_fnacimiento') ? Input::old('madre_fnacimiento') : date('d-m-Y',strtotime($madre->fnacimiento)),array('class'=>'form-control','disabled'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('madre_vive', 'Vive:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::select('madre_vive', array('1' => 'SI','0'=>'NO'), Input::old('madre_vive') ? Input::old('madre_vive') : $madre->vive, array('class'=>'form-control'))}}
	</div>
</div>
<div class="form-group">
	{{Form::label('madre_vcestudiante', '¿Vive con el estudiante?:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::select('madre_vcestudiante', array('1' => 'SI','0'=>'NO'), Input::old('madre_vcestudiante') ? Input::old('madre_vcestudiante') : $madre->pivot->vcestudiante, array('class'=>'form-control'))}}
	</div>
</div>

<div class="form-group">
	{{Form::label('madre_ginstruccion', 'Grado de instrucción:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::select('madre_ginstruccion', array('UI' => 'UNIVERSITARIA INCOMPLETA','UC'=>'UNIVERSITARIA COMPLETA','TC'=>'TECNICA COMPLETA','TI' => 'TECNICA INCOMPLETA','SE' => 'SECUNDARIA'), Input::old('madre_ginstruccion') ? Input::old('madre_ginstruccion') : $madre->ginstruccion, array('class'=>'form-control'))}}
	</div>
</div>

<div class="form-group">
	{{Form::label('madre_ocupacion', 'Ocupacion:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-2">
		{{Form::text('madre_ocupacion', Input::old('madre_ocupacion') ? Input::old('madre_ocupacion') : $madre->ocupacion,array('class'=>'form-control'))}}
	</div>
</div>

<div class="form-group">
	{{Form::label('madre_esapoderado', '¿Es el apoderado?:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::checkbox('madre_esapoderado', 'madre_esapoderado', Input::old('madre_esapoderado') ? Input::old('madre_esapoderado') : $madre->pivot->esapoderado, array('class'=>'form-control','onchange'=>'accion_chk_apoderado()'))}}
	</div>
</div>
@endif

<div id="apoderado">
	<legend>Datos del apoderado</legend>
	<div class="form-group">
		{{Form::label('apoderado_dni', 'DNI:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-3">
			{{Form::text('apoderado_dni', Input::old('apoderado_dni') ? Input::old('apoderado_dni') : $apoderado->dni,array('class'=>'form-control'))}}
		</div>	
	</div>
	<div class="form-group">
		{{Form::label('apoderado_appaterno', 'Apellido paterno:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-3">
			{{Form::text('apoderado_appaterno', Input::old('apoderado_appaterno') ? Input::old('apoderado_appaterno') : $apoderado->appaterno,array('class'=>'form-control'))}}
		</div>	
	</div>
	<div class="form-group">
		{{Form::label('apoderado_apmaterno', 'Apellido materno:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-3">
			{{Form::text('apoderado_apmaterno', Input::old('apoderado_apmaterno') ? Input::old('apoderado_apmaterno') : $apoderado->apmaterno,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{Form::label('apoderado_nombres', 'Nombres:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-3">
			{{Form::text('apoderado_nombres', Input::old('apoderado_nombres') ? Input::old('apoderado_nombres') : $apoderado->nombres,array('class'=>'form-control'))}}
		</div>
	</div>
	<div class="form-group">
		{{Form::label('apoderado_fnacimiento', 'Fecha de nacimiento:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-2">
			{{Form::text('apoderado_fnacimiento', Input::old('apoderado_fnacimiento') ? Input::old('apoderado_fnacimiento') : $apoderado->fnacimiento,array('class'=>'form-control','readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{Form::label('apoderado_ginstruccion', 'Grado de instrucción:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-3">
			{{Form::select('apoderado_ginstruccion', array('UI' => 'UNIVERSITARIA INCOMPLETA','UC'=>'UNIVERSITARIA COMPLETA','TC'=>'TECNICA COMPLETA','TI' => 'TECNICA INCOMPLETA','SE' => 'SECUNDARIA'), Input::old('apoderado_ginstruccion') ? Input::old('apoderado_ginstruccion') : $apoderado->ginstruccion, array('class'=>'form-control'))}}
		</div>
	</div>

	<div class="form-group">
		{{Form::label('apoderado_ocupacion', 'Ocupacion:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-2">
			{{Form::text('apoderado_ocupacion', Input::old('apoderado_ocupacion') ? Input::old('apoderado_ocupacion') : $apoderado->ocupacion,array('class'=>'form-control'))}}
		</div>
	</div>

	<div class="form-group">
		{{Form::label('apoderado_vcestudiante', '¿Vive con el estudiante?:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-1">
			{{Form::select('apoderado_vcestudiante', array('1' => 'SI','0'=>'NO'), Input::old('apoderado_vcestudiante') ? Input::old('apoderado_vcestudiante') : $apoderado->pivot->vcestudiante, array('class'=>'form-control'))}}
		</div>
	</div>

	<div class="form-group">
		{{Form::label('apoderado_parentesco', 'Parentesco:',array('class'=>'col-lg-2 control-label'))}}
		<div class="col-lg-2">
			{{Form::select('apoderado_parentesco', array('HE' => 'HERMANO','TI'=>'TIO(A)','AB'=>'ABUELO(A)'), Input::old('apoderado_parentesco') ? Input::old('apoderado_parentesco') : $apoderado->pivot->parentesco, array('class'=>'form-control'))}}
		</div>
	</div>
</div>

<legend>Ficha de estudiante</legend>
<div class="form-group">
	{{Form::label('ficha_plengua', 'Lengua materna:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('ficha_plengua', Input::old('ficha_plengua') ? Input::old('ficha_plengua') : $ficha->plengua,array('class'=>'form-control','disabled'))}}
	</div>

</div>
<div class="form-group">
	{{Form::label('ficha_slengua', 'Segunda lengua:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::text('ficha_slengua', Input::old('ficha_slengua') ? Input::old('ficha_slengua') : $ficha->slengua,array('class'=>'form-control'))}}
	</div>	
</div>

<!-- <div class="form-group">
	{{Form::label('ficha_religion', 'Religión:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-3">
		{{Form::select('ficha_religion', array('CATOLICA','PROTESTANTE','ISLAM'), Input::old('ficha_religion') ? Input::old('ficha_religion') : $ficha->religion, array('class'=>'form-control'))}}
	</div>
</div> -->
<div class="form-group">
	{{Form::label('ficha_nhermanos', 'Números de hermanos:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::text('ficha_nhermanos', Input::old('ficha_nhermanos') ? Input::old('ficha_nhermanos') : $ficha->nhermanos,array('class'=>'form-control'))}}				
	</div>

</div>

<div class="form-group">
	{{Form::label('ficha_lugarhermanos', 'Lugar que ocupa entre los hermanos:',array('class'=>'col-lg-2 control-label'))}}
	<div class="col-lg-1">
		{{Form::text('ficha_lugarhermanos', Input::old('ficha_lugarhermanos') ? Input::old('ficha_lugarhermanos') : $ficha->lugarhermanos,array('class'=>'form-control'))}}				
	</div>

</div>

<div class="form-group">
	<div class="col-lg-3">
		{{Form::submit('Finalizar matrícula',array('class'=>'btn btn-primary btn-block'))}}
	</div>	
</div>



{{Form::close()}}
@stop

@section('javascript')
@parent
{{HTML::script('assets/js/funciones.js')}}
@stop