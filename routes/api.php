<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/departamentos','ApiController@Departamentos');
Route::get('/provincias','ApiController@Provincias');
Route::get('/municipios','ApiController@Municipios');
Route::get('/distritos','ApiController@Distritos');



//ingresar datos de ubicacion
Route::get('/insertar/departamentos','ApiController@insertarDepartamentos');
Route::get('/insertar/provincias','ApiController@insertarProvincias');
Route::get('/insertar/municipios','ApiController@insertarMunicipios');
Route::get('/insertar/distritos','ApiController@insertarDistritos');

//inserta tipo de examens
Route::get('/tipo','ApiController@tipoExamenes');


//genera los barrios
Route::get('/generar','ApiController@generar');


//genera direcciones
Route::get('/insertar/direccion','ApiController@insertDireccion');


Route::get('/getBarrio','ApiController@getBarrio');


Route::get('/insertar/pacientes','ApiController@insertarPacientes');


// Genera los usuarios para loguearse

Route::get('/usuarios','ApiController@generarUsuarios');


Route::get('/prueba','PruebaControlle@prueba');
