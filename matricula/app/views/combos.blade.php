<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p> {{Form::select('departamento', $departamentos, '0', array('id'=>'cboDepartamentos'))}}</p>
	<p> {{Form::select('provincia', array(''), '0', array('id'=>'cboProvincias'))}} </p>
	<p> {{Form::select('distrito', array(''), '0', array('id'=>'cboDistritos'))}} </p>

	<p> {{Form::select('nivel', $niveles, '0', array('id'=>'cboNiveles'))}} </p>
	<p> {{Form::select('grado', array(''), '0', array('id'=>'cboGrados'))}} </p>
	<p> {{Form::select('seccion', array(''), '0', array('id'=>'cboSecciones'))}} </p>
	
	
	{{HTML::script('assets/js/jquery.min.js')}}
	{{HTML::script('assets/js/magia.js')}}
	<script>
		$(document).on('ready',cargarAcademico);
		$(document).on('ready',cargarUbigeo);
	</script>
</body>
</html>