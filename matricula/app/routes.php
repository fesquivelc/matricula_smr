
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

    Route::get('/paso1','MatricularController@showEstudiantes');

    Route::get('/paso2/{dni}', 'MatricularController@showOperacion');

    Route::get('/paso3/{dni}', 'MatricularController@showFicha');

    Route::post('/paso2', 'MatricularController@postOperacion');

    Route::post('/paso3', 'MatricularController@postFicha');

    Route::get('/deudas/{dni}','MatricularController@showDeudas');

    Route::get('/paso4/{dni}', 'MatricularController@showCompromiso');

    Route::get('/pruebas',function(){
        $departamentos = Departamento::lists('nombre','id');
        $departamentos['0'] = '--Escoge un departamento--';
        return View::make('combos',array('departamentos'=>$departamentos));
    });

    Route::post('/utilitario/ubigeo/provincias', 'UtilitarioController@showProvincias');
    Route::post('/utilitario/ubigeo/distritos', 'UtilitarioController@showDistritos');
    Route::post('/utilitario/academico/grados', 'UtilitarioController@showGrados');
    Route::post('/utilitario/academico/secciones', 'UtilitarioController@showSecciones');
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('/logout', 'AuthController@logOut');    
});


// Route::get('/control',function()
// {
//     return View::make('view')
// });

// Route::get('/','AdministracionController@showanioacademico');
// Route::post('/administracion/anioinicio','AdministracionController@ingresoAnio');
// Route::get('/administracion/anioiniciomod','AdministracionController@modificarAnioAcademico');
// Route::get('/',function()
// {
//     return View::make('administracion/control');
// });
Route::get('/cronograma', 'AdministracionController@showCronograma');
Route::post('/nuevocronograma', 'AdministracionController@insertCronograma');
Route::post('/actualizarcronograma', 'AdministracionController@updateCronograma');
Route::get('/estudiantes','AdministracionController@mostrarAlumnosMatriculados');

?>