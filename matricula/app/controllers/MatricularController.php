<?php

class MatricularController extends \BaseController {

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

	public function showCompromiso($dni){
		$matricula = Matricula::MatriculaActual($dni)->first();
		$estudiante = $matricula->estudiante;

		return View::make('matricula/matantpaso4',array('estudiante'=>$estudiante,'matricula'=>$matricula));
	}

	public function showEstudiantes(){
		$user = Auth::user();

		$apoderado = $user->apoderado;

		$estudiantes = $apoderado->estudiantes;

		



		return View::make('matricula/matantpaso1',array('estudiantes'=>$estudiantes));
	}

	public function showDeudas($dni){
		$estudiante = Estudiante::find($dni);

		

		$deudas = $estudiante->deudas; 

		// $sigseccion = siguienteSeccion(Seccion::find($matricula->seccion_id));

		return View::make('matricula/deudas', array('deudas' => $deudas,'estudiante' => $estudiante));
	}

	public function showOperacion($dni){
		$estudiante = Estudiante::find($dni);

		$anioanterior = AnioAcademico::where('anio','=',date('Y')-1)->first();

		// return Matricula::where('estudiante_dni','=',$estudiante->dni)->get();
		$matricula =  DB::table('matriculas')
								->where('anio_id','=',$anioanterior->id)
								->where('estudiante_dni','=',$estudiante->dni)->first();

		// return $matricula->seccion_id;

		$seccionAnt = Seccion::find($matricula->seccion_id);

		$grado = Grado::where('gradoant_id','=',$seccionAnt->grado->id)->first();

		$seccion = Seccion::where('descripcion','=',$seccionAnt->descripcion)->where('grado_id','=',$grado->id)->first();
		
		Session::put('grado', $grado->id);

		Session::put('seccion', $seccion->id);

		return View::make('matricula/matantpaso2', array('estudiante' => $estudiante,'seccionAnt'=>$seccionAnt,'grado'=>$grado));
	}

	public function postOperacion(){
		$operacion = Input::get('operacion');
		$dni = Input::get('dni');

		$requisito = Requisito::where('nombre','=','PAGO DE MATRICULA')->first();

		$anioacademico = AnioAcademico::where('anio','=',date('Y'))->first();

		Session::put('anio', $anioacademico->id);

		$estudiante = Estudiante::find($dni);

		$reqEstudiante = new RequisitoEstudiante();

		$reqEstudiante->detalle = $operacion;

		$reqEstudiante->presento = false;

		$reqEstudiante->estudiante()->associate($estudiante);

		$reqEstudiante->anioacademico()->associate($anioacademico);

		$reqEstudiante->requisito()->associate($requisito);

		$reqEstudiante->save();


		//Obtener datos de los padres para pasarlo como parametro 
		return Redirect::to('/paso3/'.$dni);

	}

	public function showFicha($dni){
		$estudiante = Estudiante::find($dni);

		Session::put('estudiante', $dni);

		$familiares = $estudiante->familiares;

		foreach ($familiares as $familiar) {
			if($familiar->pivot->parentesco == 'PA'){
				$padre = $familiar;
				Session::put('padre',$padre->dni);
			}elseif ($familiar->pivot->parentesco == 'MA') {
				$madre = $familiar;
				Session::put('madre', $madre->dni);
			}
			if($familiar->pivot->esapoderado){
				$apoderado = $familiar;
				Session::put('apoderado', $apoderado->dni);
			}
		}

		$ficha = $estudiante->ficha;

		return View::make('matricula/matantpaso3', array('estudiante'=>$estudiante,'padre'=>$padre,'madre'=>$madre,'apoderado'=>$apoderado,'ficha'=>$ficha));
	}

	public function postFicha(){
		$estudiante = Estudiante::find(Session::get('estudiante'));
		/*
		DATOS ACTUALIZABLES DEL PADRE
		*/
		$familiares = $estudiante->familiares;

		foreach ($familiares as $familiar) {
			if($familiar->pivot->parentesco == 'PA'){
				$padre = $familiar;
				
			}elseif ($familiar->pivot->parentesco == 'MA') {
				$madre = $familiar;
				
			}
			if($familiar->pivot->esapoderado){
				$apoderado = $familiar;				
			}

		}
		$padre->vive = Input::get('padre_vive');
		if($padre->vive)
		{
			$padre->ginstruccion = Input::get('padre_ginstruccion');
			$padre->ocupacion = Input::get('padre_ocupacion');
			$padre->pivot->vcestudiante = Input::get('padre_vcestudiante');
			$padre->pivot->esapoderado = Input::get('padre_esapoderado');			
		}

		

		/*
		DATOS ACTUALIZABLES DE LA MADRE
		*/

		$madre->vive = Input::get('madre_vive');
		if($madre->vive)
		{
			$madre->ginstruccion = Input::get('madre_ginstruccion');
			$madre->ocupacion = Input::get('madre_ocupacion');
			$madre->pivot->vcestudiante = Input::get('madre_vcestudiante');
			$madre->pivot->esapoderado = Input::get('madre_esapoderado');
		}

		/*
		
		*/

		$padre->save();
		$madre->save();

		if (!$padre->pivot->esapoderado and !$madre->pivot->esapoderado)
		{
			if(Familiar::find(Input::get('apoderado_dni'))){
				$apoderado->pivot->vcestudiante = Input::get('apoderado_vcestudiante');
				$apoderado->pivot->esapoderado = true;
				$apoderado->ginstruccion = Input::get('apoderado_ginstruccion');
				$apoderado->ocupacion = Input::get('apoderado_ocupacion');

				$apoderado->save();
			}
			else
			{
				$new_apoderado = new Apoderado();
				$new_apoderado->nombres = Input::get('apoderado_nombres');
				$new_apoderado->appaterno = Input::get('apoderado_appaterno');
				$new_apoderado->apmaterno = Input::get('apoderado_apmaterno');
				$new_apoderado->ginstruccion = Input::get('apoderado_ginstruccion');
				$new_apoderado->ocupacion = Input::get('apoderado_ocupacion');
				$new_apoderado->fnacimiento = Input::get('fnacimiento');
				$new_apoderado->vive = true;
				$apo_parentesco = Input::get('apoderado_parentesco');
				$apo_vcestudiante = Input::get('apoderado_vcestudiante');
				$new_apoderado->estudiantes()->attach($estudiante->dni,array('vcestudiante'=>$apo_vcestudiante,'parentesco'=>$apo_parentesco,'esapoderado'=>true));

				$new_apoderado->save();
			}
		}

		/*
		FICHA DEL ESTUDIANTE
		*/



		$ficha = $estudiante->ficha;

		$ficha->slengua = Input::get('ficha_slengua');
		$ficha->nhermanos = Input::get('ficha_nhermanos');
		$ficha->lugarhermanos = Input::get('ficha_lugarhermanos');

		$ficha->save();


		/*
			A MATRICULAR
		*/

		$requisito = Requisito::where('nombre','=','PAGO DE MATRICULA')->first();
		$fecha = date('Y-m-d');
		$seccion = Seccion::find(Session::get('seccion'));
		$anioacademico = AnioAcademico::find(Session::get('anio'));
		$matricula = new Matricula();

		$matricula->seccion()->associate($seccion);
		$matricula->fecha = $fecha;
		$matricula->estudiante()->associate($estudiante);
		$matricula->apoderado()->associate($apoderado);
		$matricula->anioacademico()->associate($anioacademico);

		/*
		VAMOS A COMPROBAR SI ES QUE SE HA CONFIRMADO EL PAGO EN EL BANCO DE LA NACION
		*/
		$pago = RequisitoEstudiante::where('estudiante_dni','=',$estudiante->dni)
								->where('anioacademico_id','=',$anioacademico->id)
								->where('requisito_id','=',$requisito->id)->first();

		if($pago->presento){
			$matricula->estado = 'E';
		}else{
			$matricula->estado = 'C';
		}

		if(strtotime($anioacademico->cronograma->ffinseguro)>= strtotime($fecha) && strtotime($fecha) >= strtotime($anioacademico->cronograma->finicioseguro))
		{
			$matricula->seguro = true;
		}
		else
		{
			$matricula->seguro = false;
		}

		if($matricula->save()){
			Session::flush();	
			Redirect::to('/paso4/'.$estudiante->dni);			
		}
		else
		{
			return 'ALUMNO NO MATRICULADO';
		}


	}
}
