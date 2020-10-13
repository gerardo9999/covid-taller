<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Paciente extends Model
{
    //
    protected $table = 'pacientes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'numero_seguro'
    ]; 
    public $timestamps=false; 


    static function pacientes($searchText){
        $pacientes = Persona::join('pacientes','pacientes.id','=','personas.id')
                                    ->join('users','users.id','personas.id')
                                    ->select('pacientes.id',
                                             'users.id as user_id',
                                             'personas.id as persona_id',
                                             'nombre','apellidos',
                                             'users.avatar')
                                    ->where('nombre','LIKE','%'.$searchText.'%')
                                    ->orWhere('apellidos','LIKE','%'.$searchText.'%')
                                    ->orWhere('pacientes.numero_seguro','LIKE','%'.$searchText.'%')
                                    ->orWhere('ci','LIKE','%'.$searchText.'%')
                                    ->paginate(10);
        return $pacientes;
    }

    static function pacienteInternado($paciente_id){
        
        $medico_id = Auth::id();
        $paciente = Paciente::findOrFail($paciente_id); 
        $pacientePersona = Persona::findOrFail($paciente_id); 
        $medico = Medico::findOrFail($medico_id);
        $medicoPersona = Persona::findOrFail($medico_id);
        $hospital = Hospital::findOrFail($medico->hospital_id); 
        
        $array = [
            "paciente"         => $paciente,
            "pacientePersona"  => $pacientePersona,
            "medico"           => $medico,
            "medicoPersona"    => $medicoPersona,
            "hospital"         => $hospital
        ];

        return $array;
    }


    static function misConsultas($searchText){
        
        $usuario = Auth::id();
        $consultas = Consulta::join('medicos','medicos.id','=','consultas.medico_id')
                            ->join('pacientes','pacientes.id','=','consultas.paciente_id')
                            ->join('personas','personas.id','=','medicos.id')
                            ->where('pacientes.id','=',$usuario)
                            ->select('consultas.id  as consulta_id','consultas.motivo_consulta',
                                    'consultas.fecha_registrada','consultas.hora_programada',
                                    'consultas.fecha_programada','consultas.estado_consulta',
                                    'consultas.medico_id','consultas.paciente_id'

                            )
                            ->where('consultas.fecha_programada','like','%'.$searchText.'%')
                            ->paginate(10);

        return $consultas;
    }

    static function misPrescripciones($searchText){
        
        $usuario = Auth::id();
        $prescripciones = Consulta::join('medicos','medicos.id','=','consultas.medico_id')
                            ->join('pacientes','pacientes.id','=','consultas.paciente_id')
                            ->join('personas','personas.id','=','medicos.id')
                            ->join('prescripciones','prescripciones.consulta_id','=','consultas.id')
                            ->select('prescripciones.medicamento',
                                     'prescripciones.cantidad_producto',
                                     'prescripciones.indicaciones',
                                     'consultas.fecha_programada',
                                     'consultas.id as consulta_id',
                                     'prescripciones.id as prescripcion_id'
                            )
                            ->where('pacientes.id','=',$usuario)
                            ->where('consultas.fecha_programada','like','%'.$searchText.'%')
                            ->paginate(10);

        return $prescripciones;
    }

    
    static function misExamenes($searchText){
        $usuario = Auth::id();
        $examenes = Consulta::join('medicos','medicos.id','=','consultas.medico_id')
                            ->join('pacientes','pacientes.id','=','consultas.paciente_id')
                            ->join('personas','personas.id','=','medicos.id')
                            ->join('examenes','examenes.consulta_id','=','consultas.id')
                            ->select('examenes.resultado',
                                     'examenes.fecha_realizado',
                                     'examenes.fecha_resultado',
                                     'consultas.fecha_programada',
                                     'consultas.id as consulta_id',
                                     'examenes.id as examen_id',
                                     'examenes.descripcion'
                            )
                            ->where('pacientes.id','=',$usuario)
                            ->where('consultas.fecha_programada','like','%'.$searchText.'%')
                            ->paginate(10);
        return $examenes;
    }


}

// <td>{{ $consulta-> }} </td>
// <td>{{ $consulta-> }} </td>
// <td>{{ $consulta-> }} </td>
// <td>{{ $consulta-> }} </td>
// @if ($consulta->==1)
