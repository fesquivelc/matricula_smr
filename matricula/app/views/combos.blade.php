<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	{{HTML::script('assets/js/jquery.min.js')}}
	{{HTML::script('assets/js/magia.js')}}
</head>
<body>
	<p> {{Form::select('departamento', $departamentos, '0', array('id'=>'cboDepartamentos'))}}</p>
	<p> {{Form::select('provincia', array(''), '0', array('id'=>'cboProvincias'))}} </p>
	<p> {{Form::select('distrito', array(''), '0', array('id'=>'cboDistritos'))}} </p>
	
	
</body>
</html>