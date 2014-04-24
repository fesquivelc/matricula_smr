Sistema de Matricula SMR
@stop

@section('pasos')
Consulta de alumnos matriculados
@stop

@section('formularios')
	<div style="max-width:500px;margin-left:auto;margin-right:auto;">
	{{Form::open(array('url'=>'/administracion/anioinicio'))}}

	{{Form::close()}}
	</div>
@stop