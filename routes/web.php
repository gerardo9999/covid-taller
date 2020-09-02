<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WebController@intro')->name('intro.index');
Route::get('/covid', 'WebController@covid')->name('covid.index');



Route::get('/cuestionario', 'WebController@cuestionario')->name('cuestionario.index');

Route::post('/cuestionario','PacienteController@storePaciente')->name('store.paciente');

Route::get('/preguntas', 'CuestionarioController@preguntas')->name('cuestionario.preguntas');



Route::post('/cuestionario/store', 'CuestionarioController@store')->name('cuestionario.store');




Route::get('/provincias', 'DepartamentoController@provincias')->name('provincia.index');
Route::post('/provincias/store', 'DepartamentoController@provinciaStore')->name('provincia.store');
Route::post('/provincias/destroy/{id}', 'DepartamentoController@provinciaDestroy')->name('provincia.destroy');
Route::post('/provincias/update/{id}', 'DepartamentoController@provinciaUpdate')->name('provincia.update');


Route::get('/municipios', 'DepartamentoController@municipios')->name('municipio.index');
Route::post('/municipios/store', 'DepartamentoController@municipioStore')->name('municipio.store');
Route::post('/municipios/destroy/{id}', 'DepartamentoController@municipioDestroy')->name('municipio.destroy');
Route::post('/municipios/update/{id}', 'DepartamentoController@municipioUpdate')->name('municipio.update');






Route::get('/especialidades', 'MedicoController@especialidades')->name('especialidad.index');
Route::post('/especialidades/store', 'MedicoController@especialidadStore')->name('especialidad.store');
Route::post('/especialidades/destroy/{id}', 'MedicoController@especialidadDestroy')->name('especialidad.destroy');
Route::post('/especialidades/update/{id}', 'MedicoController@especialidadUpdate')->name('especialidad.update');





Route::get('/medicos', 'MedicoController@medicos')->name('medico.index');
Route::get('/medicos/create', 'MedicoController@medicoCreate')->name('medico.create');
Route::get('/medicos/edit/{id}', 'MedicoController@medicoEdit')->name('medico.edit');
Route::post('/medicos/store', 'MedicoController@medicoStore')->name('medico.store');
Route::post('/medicos/destroy/{id}', 'MedicoController@medicoDestroy')->name('medico.destroy');
Route::post('/medicos/update/{id}', 'MedicoController@medicoUpdate')->name('medico.update');



Route::get('/pacientes', 'PacienteController@pacientes')->name('paciente.index');
Route::get('/pacientes/create', 'PacienteController@pacienteCreate')->name('paciente.create');
Route::get('/pacientes/edit/{id}', 'PacienteController@pacienteEdit')->name('paciente.edit');
Route::post('/pacientes/store', 'PacienteController@pacienteStore')->name('paciente.store');
Route::post('/pacientes/destroy/{id}', 'PacienteController@pacienteDestroy')->name('paciente.destroy');
Route::post('/pacientes/update/{id}', 'PacienteController@pacienteUpdate')->name('paciente.update');



Route::get('/hospitales', 'HospitalController@hospitales')->name('hospital.index');
Route::get('/hospitales/create', 'HospitalController@hospitalCreate')->name('hospital.create');
Route::get('/hospitales/edit/{id}', 'HospitalController@hospitalEdit')->name('hospital.edit');
Route::get('/hospitales/show/{id}', 'HospitalController@hospitalShow')->name('hospital.show');

Route::post('/hospitales/store', 'HospitalController@hospitalStore')->name('hospital.store');
Route::post('/hospitales/destroy/{id}', 'HospitalController@hospitalDestroy')->name('hospital.destroy');
Route::post('/hospitales/update/{id}', 'HospitalController@hospitalUpdate')->name('hospital.update');












Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
