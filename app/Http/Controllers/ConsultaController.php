<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Medico;
use App\Paciente;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConsultaController extends Controller
{
    
    
    public function index(){
        return view('sistema.modules.consultas.index');
    } 
    public function create(){
        $paciente =  Paciente::join('personas','personas.id','pacientes.id')->get();
        $medicos =  Medico::join('personas','personas.id','medicos.id')->get();

        return view('sistema.modules.consultas.create',[
            'pacientes'=> $paciente,
            'medicos'=> $medicos
        ]);
    }

    public function createConsultaPaciente($paciente_id){
        $paciente = Paciente::findOrFail($paciente_id);
        $persona = Persona::findOrFail($paciente_id);
        return view('sistema\modules\consultas\createPaciente',[
             "paciente"=>$paciente,
             "persona"=>$persona
        ]);
    }
    public function storeConsulta(Request $request){
        
        $consulta = new Consulta();
        $consulta->estado_consulta = 1;  // espera 
        $consulta->motivo_consulta = $request->motivo_consulta; 

        $consulta->fecha_registrada = date('Y-m-d'); 
        $consulta->hora_programada = $request->hora_programada;
        $fecha_programada = date("Y-m-d",strtotime($request->get('fecha_programada')));
        $consulta->fecha_programada  = $fecha_programada;
        $consulta->paciente_id = $request->paciente; 
        $consulta->medico_id = $request->medico; 
        $consulta->save();

        return Redirect::to('/consultas')->with('create','El registro se ha realizado correctamente');
    }
    public function storeConsultaMedico(Request $request){
        
        // return $request;
        $id = Auth::user()->id;
        
        // return ["data" =>$request, "id"=>$id]; 

        $consulta = new Consulta();
        $consulta->estado_consulta = 1;  // espera 
        $consulta->hora_programada = $request->hora_programada;
        $consulta->motivo_consulta = $request->motivo_consulta; 
        $consulta->fecha_registrada = date('Y-m-d'); 
        $fecha_programada = date("Y-m-d",strtotime($request->get('fecha_programada')));
        $consulta->fecha_programada  = $fecha_programada;
        $consulta->paciente_id = $request->paciente; 
        $consulta->medico_id = $id; 
        $consulta->save();

        return Redirect::to('/consultas')->with('create','El registro se ha realizado correctamente');
    }



    public function editConsulta($id){

        

        $consulta = Consulta::where('id','=',$id)->get();
        $paciente = Paciente::join('personas','personas.id','=','pacientes.id')->where('pacientes.id','=',$consulta[0]->paciente_id)->get();

        return view('sistema.modules.consultas.update',[
            "consulta"=>$consulta,
            "pacientes" => $paciente
        ]);
    }
    public function updateConsultaMedico(Request $request,$id){
        
               $user_id = Auth::user()->id;
        
               // return ["data" =>$request, "id"=>$id]; 
       
               $consulta =  Consulta::findOrFail($id);
               $consulta->estado_consulta = 1;  // espera 
               $consulta->hora_programada = $request->hora_programada;
               $consulta->motivo_consulta = $request->motivo_consulta; 
               $consulta->fecha_registrada = date('Y-m-d'); 
               $fecha_programada = date("Y-m-d",strtotime($request->get('fecha_programada')));
               $consulta->fecha_programada = $fecha_programada;
               $consulta->paciente_id = $request->paciente; 
               $consulta->medico_id = $user_id; 
               $consulta->update();
       
               return Redirect::to('/consultas')->with('create','El registro se ha actualizado correctamente');
    }
    public function deleteConsultaMedico($id){
        $consulta =  Consulta::findOrFail($id);
        $consulta->delete();

        return Redirect::to('/consultas')->with('delete','El registro se ha eliminado correctamente');

    }

    public function cancelar($id){
        $consulta =  Consulta::findOrFail($id);
        $consulta->estado_consulta = 0;
        $consulta->update();
    }
    public function realizada($id){
        $consulta =  Consulta::findOrFail($id);
        $consulta->estado_consulta = 3;
        $consulta->update();


    }


    public function paciente(){
        return view('sistema.modules.consultas.paciente');
    }

    public function medico(){

        $id = Auth::id();
        $consultaMedico = Consulta::paginate(10);

        // $consultaMedico = DB::select("SELECT consultas.id FROM consultas,medicos,pacientes 
        //     WHERE consultas.medico_id = medicos.id AND consultas.paciente_id = pacientes.id
        // ");
            //    return $consultaMedico['data'];

            //    return view('sistema.modules.consultas.medico',[
            //        'consultas'=> $consultaMedico
            //    ]);
        // return [
        //     "consultas"=> $consultaMedico[0],
            
        // ];

        // return view('sistema.modules.consultas.medico',[
        //     'consultas'=> $consultaMedico,
        //     'id'=>$id
        // ]);

    }
}
