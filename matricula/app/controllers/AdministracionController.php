<?php

class AdministracionController extends BaseController {

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

	public function showanioacademico()
	{
		$anioacademico = AnioAcademico::where('anio','=',date('Y'))->first();
		
			if(is_null($anioacademico))
			{
				return View::make('administracion/anioinicio',array('anioacademico'=>$anioacademico));
			}
		
		return View::make('administracion/anioinicio',array('anioacademico'=>$anioacademico));
	}

	public function modificarAnioAcademico($id)
	{
		$anioacademico = AnioAcademico::find($id)

		$anioacademico->anio=Input::get('anio');
		$anioacademico->finicioclases=Input::get('finicioclases');
		$anioacademico->ffinclases=Input::get('ffinclases');
		$anioacademico->denominacion=Input::get('denominacion');
		$anioacademico->save();

		return View::make('administracion/anioinicio',array('anioacademico'=>$anioacademico));
	}
	public function ingresoAnio()
	{
		$anioacademico = New AnioAcademico;

		$anioacademico->anio = Input::get('anio');
		$anioacademico->finicioclases = Input::get('finicioclases');
		$anioacademico->ffinclases = Input::get('ffinclases');
		$anioacademico->denominacion = Input::get('denominacion');
		$anioacademico->save();

		return Redirect::to('/');	 
	}

	public function mostrarAlumnosMatriculados()
	{
		$alumnos= Alumnos::all();


	}
}
