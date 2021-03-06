<?php

class UtilitarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function showProvincias()
	{
		if(Request::ajax())
		{
			$idDepartamento = Input::get('idDepartamento');
			$departamento = Departamento::find($idDepartamento);

			$provincias = $departamento->provincias;

			$html = "<option value='0'>--Escoja una provincia--</option>";

			foreach ($provincias as $provincia) {
				$html.="<option value='".$provincia->id."'>".$provincia->nombre."</option>";
			}

			return $html;
		}
	}

	public function showDistritos()
	{
		if(Request::ajax()){
			$idProvincia = Input::get('idProvincia');
			$provincia = Provincia::find($idProvincia);

			$distritos = $provincia->distritos;

			$html = "<option value='0'>--Escoja un distrito--</option>";

			foreach ($distritos as $distrito) {
				$html.="<option value='".$distrito->id."'>".$distrito->nombre."</option>";
			}

			return $html;
		}
	}

	public function showGrados(){
		if(Request::ajax())
		{
			$idNivel = Input::get('idNivel');
			$nivel = Nivel::find($idNivel);

			$grados = $nivel->grados;

			$html = "<option value='0'>--Grado--</option>";

			foreach ($grados as $grado) {
				$html.="<option value='".$grado->id."'>".$grado->descripcion."</option>";
			}

			return $html;
		}
	}

	public function showSecciones(){
		if(Request::ajax())
		{
			$idGrado = Input::get('idGrado');
			$grado = Grado::find($idGrado);

			$secciones = $grado->secciones;

			$html = "<option value='0'>--Sección--</option>";

			foreach ($secciones as $seccion) {
				$html.="<option value='".$seccion->id."'>".$seccion->descripcion."</option>";
			}

			return $html;
		}
	}



}
