
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//include_once 'routes_aldo';

Route::get('/login', 'AuthController@showLogin');

Route::post('/login','AuthController@postLogin');

Route::get('/logout', 'AuthController@logOut');

// Route::get('/hola/', function()
// {
// 	return 'Hola a todos';
// });

// Route::get('/generar', function()
// {
//     $html = '<html><body>';
//     $html.= '<p style="color:red">Generando un sencillo pdf ';
//     $html.= 'de forma realmente sencilla.</p>';
//     $html.= '</body></html>';
//     return PDF::load($html, 'A4', 'landscape')->show();
// });

// Route::get('/login', function(){
// 	return View::make('login');
// });


//Rutas para despues de logueo
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.

    Route::get('/', function(){
        return Redirect::to('/paso1');
    });

    Route::get('/paso1', function()
    {
        return View::make('matricula/matnuevopaso1');
    });

    Route::get('/paso2', function(){
    	return View::make('matricula/matnuevopaso2');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});

?>