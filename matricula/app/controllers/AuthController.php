<?php

class AuthController extends \BaseController {

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

	public function showLogin(){
		if(Auth::check())
		{
			Redirect::to('/');
		}
		return View::make('/login');
	}

	public function postLogin(){
		// $rules = [		
		// 	"username"      => "required|max:30|min:6|unique:users",
		// 	"password"      => "required|max:30|min:6",		
		// ];

		// $messages = [
		// 	"required"	=>	"Este campo es obligatorio",
		// ];

		// $validator = Validator::make(Input::all(), $rules, $messages);

		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			);
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.

		if(Auth::attempt($credentials))
		{
			if (Auth::user()->activo) { //comprobamos que el usuario este activo
				# code...
				return Redirect::to('/');
			}
            // De ser datos válidos nos mandara a la bienvenida
			
		}
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
		return Redirect::to('/login')
		->with('mensaje_error', 'Tus datos son incorrectos o su nombre de usuario esta inactivo')
		->withInput();
	}

	public function logOut(){
		Auth::logout();
		return Redirect::to('login')
		->with('mensaje_error', 'Tu sesión ha sido cerrada.');
	}

}
