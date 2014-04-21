<?php

class RolController extends \BaseController {

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


}

/*
	public function getIndex()
	{
		$rol = Rol::all();
		return View::make('roles.index')->with('roles',$rol);
	}

	public function getCreate()
	{
		return View::make('roles.create');
	}

	public function postCreate()
	{
		$rol = new Rol;

		$rol->nombre = Input::get('nombre');
		$rol->descripcion = Input::get('descripcion');

		$rol->save();

		return Redirect::to('roles');
	}

	public function getDelete($rolId)
	{
		$rol = Rol::find($rolId);

		if(is_null($rol))
		{
			return Redirect::to('roles');
		}

		$rol->delete();
	}

	public function getUpdate($rolId)
	{
		$rol = new Rol::find($rolId);

		if(is_null($rol))
		{
			return Redirect::to('roles');
		}

		return View::make('roles.update')->with('roles',$rol);
	}

	public function postUpdate($rolId)
	{
		$rol = Rol::find($rolId);

		if(is_null($rol))
		{
			return Redirect::to('roles');
		}

		$rol->nombre = Input::get('nombre');
		$rol->descripcion = Input::get('descripcion');

		$rol->save();

		return Redirect::to('roles');
	}
*/