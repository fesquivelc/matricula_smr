window.onload = function()
{
	accion_chk_apoderado();
}
//Para el paso 3 de la matricula donde se tiene que ocultar el div de apoderado en caso de que uno de los padres
//sea apoderado del alumno
function accion_chk_apoderado(marcado,id_otro)
{
	var chk_padre_apoderado = document.getElementById('padre_esapoderado');
	var chk_madre_apoderado = document.getElementById('madre_esapoderado');
	// var otro = document.getElementById('id_otro');
	var div_apoderado = document.getElementById('apoderado');

	if(chk_padre_apoderado.checked)
	{
		chk_madre_apoderado.checked = false;
		ocultar_div(div_apoderado);
	}
	if(chk_madre_apoderado.checked)
	{
		chk_padre_apoderado.checked = false;
		ocultar_div(div_apoderado);
	}
	if(!chk_padre_apoderado.checked && !chk_madre_apoderado.checked)
	{
		mostrar_div(div_apoderado);
	}

}

function ocultar_div(div)
{
	div.style.display = 'none';
}

function mostrar_div(div)
{
	div.style.display = 'block';
}

$('#madre_fnacimiento').datepicker();

$('#apoderado_fnacimiento').datepicker();