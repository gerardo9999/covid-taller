<?php

namespace App\Http\Controllers;

use App\Cuestionario;
use App\DetalleCuestionario;
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

    public function preguntas()
    {
        
        return view('page.modules.pregunta.index');
    }

    public function resultado()
    {
        
        return view('page.modules.cuestionario.resultado');
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

    public function detalleCuestionario(Request $request,$id){
       
       
        $c= count($request->respuesta);
        $si = 0;
        $no = 0;

        // return $request->respuesta[11];

        // return $c;

        for ($i=0; $i < $c; $i++) { 
           if($request->respuesta[$i]=="si"){
                $si++;
           }else{
               $no++;
           }
        }

        $nota = $si*10;
        // return $nota;


        $cuestionario = new Cuestionario();
        $cuestionario->nota = $nota;

        if($nota < 30){$cuestionario->probabilidad = "Baja Probabilidad";}
        if($nota > 30 && $nota <60 ){$cuestionario->probabilidad = "Mediana Probabilidad";}
        if($nota > 60 ){$cuestionario->probabilidad = "Alta Probabilidad";}
        $cuestionario->persona_id = $id;
        $cuestionario->save();

        // return $cuestionario;




        for ($i=0; $i < $c; $i++) { 



            $detalle = new DetalleCuestionario();
            $detalle->respuesta = $request->respuesta[$i]; 
            $detalle->cuestionario_id = $cuestionario->id; 
            $detalle->pregunta_id = $i+1; 
            if($request->respuesta[$i]=="si"){$detalle->nota=10;}else{$detalle->nota=0;}
            $detalle->save();
        } 
        return Redirect::to('/');
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
