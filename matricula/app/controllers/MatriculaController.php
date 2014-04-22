<?php

class MatriculaController extends \BaseController {

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

		return View::make('matricula/matnuevopaso1',array('estudiantes'=>$estudiantes));
	}

	public function showDeudas($dni){
		$estudiante = Estudiante::find($dni);

		$deudas = $estudiante->deudas; 


		return View::make('matricula/deudas', array('deudas' => $deudas,'estudiante' => $estudiante));
	}

	public function showOperacion($dni){
		$estudiante = Estudiante::find($dni);

		return View::make('matricula/matnuevopaso2', array('estudiante' => $estudiante));
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
	}


}
