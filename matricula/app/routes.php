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

Route::get('/', function()
{
	$html = View::make('layout');
	return $html;
});

<<<<<<< HEAD
Route::controller('roles','RolController');

=======
Route::get('/hola/', function()
{
	return 'Hola a todos';
});

Route::get('/generar', function()
{
    $html = '<html><body>';
    $html.= '<p style="color:red">Generando un sencillo pdf ';
    $html.= 'de forma realmente sencilla.</p>';
    $html.= '</body></html>';
    return PDF::load($html, 'A4', 'landscape')->show();
});
>>>>>>> 43db7716dfd3c821132ea9d8a1a6ef05e237c3cd
