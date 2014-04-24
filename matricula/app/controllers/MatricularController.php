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

	public function showEstudiantes(){
		$user = Auth::user();

		$apoderado = $user->apoderado;

		$estudiantes = $apoderado->estudiantes;

		$anioanterior = AnioAcademico::where('anio','=',date('Y')-1)->first();
		// return Matricula::where('estudiante_dni','=',$estudiante->dni)->get();
		$matricula =  DB::table('matriculas')
								->where('anio_id','=',$anioanterior->id)
								->where('estudiante_dni','=',$estudiante->dni)->first();

		$sigseccion = siguienteSeccion(Seccion::find($matricula->seccion_id));


		return View::make('matricula/matantpaso1',array('estudiantes'=>$estudiantes,'sigseccion'=>$sigseccion));
	}

	public function showDeudas($dni){
		$estudiante = Estudiante::find($dni);

		$deudas = $estudiante->deudas; 


		return View::make('matricula/deudas', array('deudas' => $deudas,'estudiante' => $estudiante));
	}

	public function showOperacion($dni){
		$estudiante = Estudiante::find($dni);
		
		return View::make('matricula/matantpaso2', array('estudiante' => $estudiante));
	}

	public function postOperacion(){
		$operacion = Input::get('operacion');
		$dni = Input::get('dni');

		$requisito = Requisito::where('nombre','=','PAGO DE MATRICULA')->first();

		$anioacademico = AnioAcademico::where('anio','=',date('Y'))->first();

		$estudiante = Estudiante::find($dni);

		$reqEstudiante = new RequisitoEstudiante();

		$reqEstudiante->motivo = $operacion;

		$reqEstudiante->presento = true;

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

		//Vemos seccion anterior
		$anioanterior = AnioAcademico::where('anio','=',date('Y')-1)->first();
		// return Matricula::where('estudiante_dni','=',$estudiante->dni)->get();
		$matriculaanterior =  DB::table('matriculas')
								->where('anio_id','=',$anioanterior->id)
								->where('estudiante_dni','=',$estudiante->dni)->first();

		
	}

	public function siguienteSeccion($seccion){
		$grado = $seccion->grado->descripcion;
		$nivel = $seccion->grado->nivel->nombre;
		if(($grado != 'QUINTO') && ($grado != 'SEXTO'))
		{
			switch ($grado) {
				case 'PRIMERO':
					return array('SEGUNDO',$nivel);
					break;
				case 'SEGUNDO':
					return array('TERCERO',$nivel);
					break;
				case 'TERCERO':
					return array('CUARTO',$nivel);
					break;
				case 'CUARTO';
					return array('QUINTO',$nivel);
					break;
			}
		}else if($nivel == 'PRIMARIA')
		{
			if($grado == 'SEXTO'){
				return array('PRIMERO','SECUNDARIA');
			}elseif ($grado == 'QUINTO') {
				return array('SEXTO',$nivel);
			}
		}
	}
}
