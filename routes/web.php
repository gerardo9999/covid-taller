<?php

use App\Consulta;
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
Route::get('/dashboard','webController@dashboard')->name('dashboard.index');


Route::get('/cuestionario', 'WebController@cuestionario')->name('cuestionario.index');

//envia las respuestas al detalle
Route::post('/cuestionario/respuesta/{id}', 'CuestionarioController@detalleCuestionario')->name('cuestionario.detalle');
Route::get('/resultado', 'CuestionarioController@resultado')->name('resultado');


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



// Consultas
Route::get('/consultas','ConsultaController@index')->name('consulta.index');
Route::get('/consultas/medicos','ConsultaController@medico')->name('consulta.medico');
Route::get('/consultas/pacientes','ConsultaController@paciente')->name('consulta.paciente');
Route::get('/consultas/create','ConsultaController@create')->name('consulta.create');
Route::post('/consultas/store','ConsultaController@storeConsulta')->name('consulta.store');
Route::get('/consultas/edit/{id}','ConsultaController@editConsulta')->name('consulta.edit');

// Route::get('/consultas/create/{id}','ConsultaController@createConsultaPaciente')->name('consulta.paciente.create');


Route::post('/consultas/delete/{id}','ConsultaController@deleteConsultaMedico')->name('consulta.delete.medico');
Route::post('/consultas/update/{id}','ConsultaController@updateConsultaMedico')->name('consulta.update.medico');
Route::post('/consultas/store','ConsultaController@storeConsultaMedico')->name('consulta.store.medico');

// 'consulta.create'
// consulta.create.medico

// Roles y usuario
Route::get('/roles','RolController@index')->name('rol.index');
Route::get('/users','UserController@index')->name('usuario.index');




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
Route::get('/misPacientes/', 'PacienteController@pacientesMedico')->name('medico.paciente.index');
Route::get('/pacientes/create', 'PacienteController@pacienteCreate')->name('paciente.create');
Route::get('/pacientes/edit/{id}', 'PacienteController@pacienteEdit')->name('paciente.edit');
Route::post('/pacientes/store', 'PacienteController@pacienteStore')->name('paciente.store');
Route::post('/pacientes/destroy/{id}', 'PacienteController@pacienteDestroy')->name('paciente.destroy');
Route::post('/pacientes/update/{id}', 'PacienteController@pacienteUpdate')->name('paciente.update');
Route::post('/internar/paciente/{id}', 'PacienteController@pacienteInternarStore')->name('internar.store');

Route::get('/paciente/medico', 'PacienteController@miMedico')->name('paciente.medico.index');
Route::get('/paciente/informe', 'PacienteController@miInforme')->name('paciente.informe');
Route::get('/paciente/consulta', 'PacienteController@misConsultas')->name('paciente.consulta.index');
Route::get('/paciente/examen', 'PacienteController@misExamenes')->name('paciente.examen.index');
Route::get('/paciente/prescripcion', 'PacienteController@misPrescripciones')->name('paciente.prescripcion.index');

// Route::get('/pacientes/hospital/{id}', 'PacienteController@pacienteInternado')->name('paciente.hospital');
Route::get('/pacientes/tratamiento/{id}', 'PacienteController@pacienteTratamiento')->name('paciente.tratamiento.create');





Route::get('/hospitales', 'HospitalController@hospitales')->name('hospital.index');
Route::get('/hospitales/create', 'HospitalController@hospitalCreate')->name('hospital.create');
Route::get('/hospitales/edit/{id}', 'HospitalController@hospitalEdit')->name('hospital.edit');
Route::get('/hospitales/show/{id}', 'HospitalController@hospitalShow')->name('hospital.show');

Route::post('/hospitales/store', 'HospitalController@hospitalStore')->name('hospital.store');
Route::post('/hospitales/destroy/{id}', 'HospitalController@hospitalDestroy')->name('hospital.destroy');
Route::post('/hospitales/update/{id}', 'HospitalController@hospitalUpdate')->name('hospital.update');





Route::name('pdf')->get('/imprimir', 'GeneradorPDFController@imprimir');

// PDF Provincias
    Route::name('provincias.confirmados.pdf')->get('/provincia/confirmados/pdf/{id}', 'GeneradorPDFController@provinciaConfirmadosPDF');
    Route::name('provincias.recuperados.pdf')->get('/provincia/recuperados/pdf/{id}', 'GeneradorPDFController@provinciaRecuperadosPDF');
    Route::name('provincias.desesos.pdf')->get('/provincia/pdf/desesos/{id}'    ,     'GeneradorPDFController@provinciaDesesosPDF');
    Route::name('provincias.descartados.pdf')->get('/provincia/descartados/pdf/{id}', 'GeneradorPDFController@provinciaDescartadosPDF');
    Route::name('provincias.sospechosos.pdf')->get('/provincia/sospechosos/pdf/{id}', 'GeneradorPDFController@provinciaSospechososPDF');
// PDF
//DIARIO
Route::name('provincia.reporte-diario-confirmados.pdf')->get('/provincia/reportediarioConfirmados/pdf/{id}', 'GeneradorPDFController@provinciaReporteDiarioConfirmadosPDF');
Route::name('provincia.reporte-diario-desesos.pdf')->get('/provincia/reportediarioDecesos/pdf/{id}', 'GeneradorPDFController@provinciaReporteDiarioDecesosPDF');



//

//PDF MUNICIPIO
    Route::name('municipios.confirmados.pdf')->get('/municipio/confirmados/pdf/{id}', 'GeneradorPDFController@municipioConfirmadosPDF');
    Route::name('municipios.recuperados.pdf')->get('/municipio/recuperados/pdf/{id}', 'GeneradorPDFController@municipioRecuperadosPDF');
    Route::name('municipios.desesos.pdf')->get('/municipio/pdf/desesos/{id}'    ,     'GeneradorPDFController@municipioDesesosPDF');
    Route::name('municipios.descartados.pdf')->get('/municipio/descartados/pdf/{id}', 'GeneradorPDFController@municipioDescartadosPDF');
    Route::name('municipios.sospechosos.pdf')->get('/municipio/sospechosos/pdf/{id}', 'GeneradorPDFController@municipioSospechososPDF');
// PDF

// PDF Examen Resultado
Route::name('resultado.pdf')->get('/resultado/pdf/{id}', 'GeneradorPDFController@resultadoExamenPDF');


Route::get('examenes','ExamenController@index')->name('examen.index');




Route::name('consulta.pdf')->get('/consulta/pdf/{id}', 'GeneradorPDFController@consultaPDF');
Route::name('diagnostico.pdf')->get('/diagnostico/pdf/{id}', 'GeneradorPDFController@diagnosticoPDF');
Route::name('prescripcion.pdf')->get('/prescripcion/pdf/{id}', 'GeneradorPDFController@prescripcionPDF');



Route::name('miPrescripcion.pdf')->get('/miPrescripcion/pdf/{id}', 'GeneradorPDFController@miPrescripcionPDF');
Route::name('miExamen.pdf')->get('/miExamen/pdf/{id}', 'GeneradorPDFController@miExamenPDF');

// 
//Medicamentos
Route::name('medicamento.index')->get('/medicamentos', 'MedicamentoController@index');
Route::name('medicamento.store')->post('/medicamentos/store', 'MedicamentoController@store');
Route::post('/medicamentos/destroy/{id}', 'MedicamentoController@destroy')->name('medicamento.destroy');
Route::post('/medicamentos/update/{id}', 'MedicamentoController@update')->name('medicamento.update');


// Tratamientos
Route::name('tratamiento.index')->get('/tratamientos', 'TratamientoController@index');
Route::post('/tratamientos/destroy/{id}', 'TratamientoController@destroy')->name('tratamiento.destroy');
Route::post('/tratamientos/create', 'TratamientoController@create')->name('tratamiento.create');

// tratamiento.destroy

Route::get('/reporte/diario' ,'ReporteController@reporteDiario')->name('reporte.diario');
Route::get('/reporte/mensual','ReporteController@reporteMensual')->name('reporte.mensual');
// reporteDiario()






Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('prueba', function () {
//     $mis = Consulta::misPacientes('eldy');
//     return ["prueba"=>$mis];
// });