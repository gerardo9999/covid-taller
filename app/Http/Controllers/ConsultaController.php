<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    
    
    public function index(){
        return view('admin.modules.consultas.index');
    } 


    public function paciente(){
        return view('admin.modules.consultas.paciente');
    }

    public function medico(){

        $id = Auth::id();
        $consultaMedico = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
        
        ->join('medicos','medicos.id','=','consultas.medico_id')
        ->select('consultas.estado_consulta',
                 'consultas.motivo_consulta',
                 'consultas.evolucion_enfermedad',
                 'consultas.fecha_consulta',
                 'consultas.fecha_programada'
                )->where('consultas.medico_id','=',$id)
       ->paginate(10);

    //    return view('admin.modules.consultas.medico',[
    //        'consultas'=> $consultaMedico
    //    ]);
        return $consultaMedico;

    }
}
