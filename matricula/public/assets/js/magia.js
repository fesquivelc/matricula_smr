$(document).on('ready',cargar);
$(document).on('ready',cargarProvincia);
$(document).on('ready',cargarDistrito);

function cargar()
{		
	$('#cboDepartamentos').on('change',cargarProvincia);
	$('#cboProvincias').on('change',cargarDistrito);
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