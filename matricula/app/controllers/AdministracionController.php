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

	/*public function modificarAnioAcademico()
	{
		$id = Input::get('idanio');
		$anioacademico = AnioAcademico::find($id)

		$anioacademico->anio=Input::get('anio');
		$anioacademico->finicioclases=Input::get('finicioclases');
		$anioacademico->ffinclases=Input::get('ffinclases');
		$anioacademico->denominacion=Input::get('denominacion');
		$anioacademico->save();

		return View::make('administracion/anioinicio',array('anioacademico'=>$anioacademico));
	}*/
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

	public function showCronograma()
	{

		$anioacademico = AnioAcademico::where('anio','=',date('Y'))->first();

		if(is_null($anioacademico))
		{
			return "No hay datos del año";
		}else
		{
			$cronograma = New Cronograma;
			$cronograma = $anioacademico->cronograma;
			if(is_null($cronograma))
			{
				return View::make('administracion/cronocreate', array('anioacademico'=>$anioacademico));
				
			}else
			{
				return View::make('administracion/cronoupdate', array('cronograma'=>$cronograma));
				
			}		
		}
	}

	public function insertCronograma()
	{
		$cronograma = New Cronograma;

		$cronograma->anioacademico_id=Input::get('anioacademico_id');
		$cronograma->finicio=Input::get('ffinicio');
		$cronograma->ffin=Input::get('ffin');
		$cronograma->finicioseguro=Input::get('finicioseguro');
		$cronograma->ffinseguro=Input::get('finicioseguro');
		$cronograma->save();

		return Redirect::to('/');
	}

	public function updateCronograma()
	{	
		$id=Input::get('cronograma');
		$cronograma = Cronograma::find($id);

		$cronograma->anioacademico_id=Input::get('anioacademico_id');
		$cronograma->finicio=Input::get('ffinicio');
		$cronograma->ffin=Input::get('ffin');
		$cronograma->finicioseguro=Input::get('finicioseguro');
		$cronograma->ffinseguro=Input::get('finicioseguro');
		$cronograma->save();

		return Redirect::to('/');
	}
	public function mostrarAlumnosMatriculados()
	{
		$anioacademico = AnioAcademico::where('anio','=',date('Y'))->first();
		$matriculas = New Matricula;
		$matriculas = $anioacademico->matricula;
		

		if(is_null($matriculas))
		{
			return "no hay alumnos matriculados";
		}else
		{
			return "hay alumnos matriculados";
		}
	}
}
