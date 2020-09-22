<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConsultaController extends Controller
{
    
    
    public function index(){
        return view('admin.modules.consultas.index');
    } 

    public function create(){
        $paciente =  Paciente::join('personas','personas.id','pacientes.id')->get();
        $medicos =  Medico::join('personas','personas.id','medicos.id')->get();

        return view('admin.modules.consultas.create',[
            'pacientes'=> $paciente,
            'medicos'=> $medicos
        ]);
    }

    public function storeConsulta(Request $request){
        
        $consulta = new Consulta();
        $consulta->estado_consulta = 1;  // espera 
        $consulta->motivo_consulta = $request->motivo_consulta; 

        $consulta->fecha_consulta = date('Y-m-d'); 
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
        $consulta->motivo_consulta = $request->motivo_consulta; 

        $consulta->fecha_consulta = date('Y-m-d'); 
        $fecha_programada = date("Y-m-d",strtotime($request->get('fecha_programada')));
        $consulta->fecha_programada  = $fecha_programada;
        $consulta->paciente_id = $request->paciente; 
        $consulta->medico_id = $id; 
        $consulta->save();

        return Redirect::to('/consultas')->with('create','El registro se ha realizado correctamente');
    }


    public function update(Request $request,$id){
        
        $consulta =  Consulta::findOrFail($id);
        $consulta->estado_consulta = 1;  // espera 
        $consulta->motivo_consulta = $request->motivo_consulta; 
        $consulta->fecha_consulta = date('Y-m-d'); 
        $consulta->fecha_programada = $request->fecha_programada; 
        $consulta->paciente_id = $request->paciente; 
        $consulta->medico_id = $request->medico; 
        $consulta->update();
        return Redirect::to('/consultas')->with('update','El registro se ha actualizado correctamente');

    }
    public function delete($id){
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
        return view('admin.modules.consultas.paciente');
    }

    public function medico(){

        $id = Auth::id();
        $consultaMedico = Consulta::paginate(10);

        // $consultaMedico = DB::select("SELECT consultas.id FROM consultas,medicos,pacientes 
        //     WHERE consultas.medico_id = medicos.id AND consultas.paciente_id = pacientes.id
        // ");
            //    return $consultaMedico['data'];

            //    return view('admin.modules.consultas.medico',[
            //        'consultas'=> $consultaMedico
            //    ]);
        // return [
        //     "consultas"=> $consultaMedico[0],
            
        // ];

        // return view('admin.modules.consultas.medico',[
        //     'consultas'=> $consultaMedico,
        //     'id'=>$id
        // ]);

    }
}
