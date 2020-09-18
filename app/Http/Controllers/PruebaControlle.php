<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PruebaControlle extends Controller
{
    public function prueba(){


        $user = Auth::user();
        
        $consultaMedico = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
        ->join('medicos','medicos.id','=','consultas.medico_id')
        ->select('consultas.estado_consulta',
                'consultas.motivo_consulta',
                'consultas.evolucion_enfermedad',
                'consultas.fecha_consulta',
                'consultas.fecha_programada'
                )->where('consultas.medico_id','=',$user->id)
       ->paginate(10);
       
        return $consultaMedico;
    }
    
}
