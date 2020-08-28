<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Distrito;
use App\Paciente;
use App\Persona;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preguntas()
    {
        
        return view('web.modules.pregunta.index');
    }

    public function store(Request $request)
    {

            
 
            $fechaNacimiento = date("Y-m-d",strtotime($request->get('fecha_nacimiento')));
            $distrito = new Distrito();
            $distrito->nombre = $request->get('distrito');
            $distrito->municipio_id = $request->get('municipio_id');
            $distrito->save();
            
            $direccion = new Direccion();
            $direccion->avenida_calle    = $request->get('avenida_calle');
            $direccion->numero_domicilio = $request->get('numero_domicilio');
            $direccion->barrio_zona      = $request->get('barrio_zona');
            $direccion->distrito_id      = $distrito->id;
            $direccion->save();
    
            $persona = new Persona();
            $persona->nombre            = $request->get('nombre');
            $persona->apellidos         = $request->get('apellidos');
            $persona->ci                = $request->get('ci');
            $persona->telefono          = $request->get('telefono');
            $persona->nacionalidad      = $request->get('nacionalidad');
            $persona->fecha_nacimiento  = $fechaNacimiento;
            $persona->sexo              = $request->get('sexo');
            $persona->direccion_id      = $direccion->id;
            $persona->save();
                        
            $user = new User();
            $user->id        = $persona->id;
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            if($request->get('sexo')=='hombre'){
                $user->avatar = 'imagenes/avatar-hombre.jpg';
            }else{
                $user->avatar = 'imagenes/avatar-mujer.png';
            }
            $user->save();
    
    
            $user->assignRole('paciente');

            $paciente = new Paciente();
            $paciente->id = $user->id;
            if($request->get('numero_seguro')){
                $paciente->numero_seguro = $request->get('numero_seguro'); 
            }else{
                $paciente->numero_seguro = 0;
            }
            $paciente->save();

       
            return Redirect::to('/preguntas')->with('paciente',$paciente);
    }

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
