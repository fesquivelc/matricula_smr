//Ejemplos de como cargar =D 

// $(document).on('ready',cargarAcademico);
// $(document).on('ready',cargarUbigeo);

function cargarAcademico()
{
	$('#cboNiveles').on('change',cargarGrado);
	$('#cboGrados').on('change',cargarSeccion);
	cargarGrado();
}

function cargarUbigeo()
{		
	$('#cboDepartamentos').on('change',cargarProvincia);
	$('#cboProvincias').on('change',cargarDistrito);
	cargarProvincia();
}



function cargarDistrito()
{
	var idProvincia = $('#cboProvincias').val();
	
	$.ajax
	({
		type : 'POST',
		url : '/utilitario/ubigeo/distritos',
		traditional : true,
		data : {idProvincia:idProvincia},
		success : function(data){
			$('#cboDistritos').html(data); //Se cargan los datos en un div determinado			
		},
		error: function(){
			data = '<option value="0">--Escoja un distrito--</option>';
			$('#cboDistritos').html(data);
		}
	});	
}

function cargarGrado()
{
	var idNivel = $('#cboNiveles').val();
	
	$.ajax
	({
		type : 'POST',
		url : '/utilitario/academico/grados',
		traditional : true,
		data : {idNivel:idNivel},
		success : function(data){
			$('#cboGrados').html(data); //Se cargan los datos en un div determinado			
		},
		error: function(){
			data = '<option value="0">--Grado--</option>';
			$('#cboGrados').html(data);
			cargarSeccion();
		}
	});	
}

function cargarProvincia()
{
	var idDepartamento = $('#cboDepartamentos').val();
	
	$.ajax
	({
		type : 'POST',
		url : '/utilitario/ubigeo/provincias',
		traditional : true,
		data : {idDepartamento:idDepartamento},
		success : function(data){
			$('#cboProvincias').html(data); //Se cargan los datos en un div determinado	
			cargarDistrito();		
		},
		error: function(){
			data = '<option value="0">--Escoja una provincia--</option>';
			$('#cboProvincias').html(data);
			cargarDistrito();
		}
	});
	
}

function cargarSeccion()
{
	var idGrado = $('#cboGrados').val();
	
	$.ajax
	({
		type : 'POST',
		url : '/utilitario/academico/secciones',
		traditional : true,
		data : {idGrado:idGrado},
		success : function(data){
			$('#cboSecciones').html(data); //Se cargan los datos en un div determinado			
		},
		error: function(){
			data = '<option value="0">--Sección--</option>';
			$('#cboSecciones').html(data);			
		}
	});	
}
