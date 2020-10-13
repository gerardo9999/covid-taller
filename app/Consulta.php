<?php

namespace App;

use App\Http\Livewire\MisPacientes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'estado_consulta',
        'motivo_consulta',
        
        'fecha_registrada',
        'fecha_programada',
        'historial_id',
        'paciente_id',
        'medico_id'
    ];


    static function mostrarConsultas($searchText){
        $id = Auth::id();
        
        if($searchText){
            $consulta = Consulta::where('consultas.fecha_programada','=',$searchText)
            ->where('medico_id','=',$id)
            ->paginate(10);
        }else{
            $consulta = Consulta::
            where('medico_id','=',$id)
            ->paginate(10);
        }
        return $consulta;
    }

    static function misPacientes($searchText){
        $id = Auth::id();
        $consulta = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
            ->join('medicos','medicos.id','=','consultas.medico_id')->join('personas','personas.id','=','pacientes.id')
            ->select('personas.nombre','personas.apellidos','personas.id','pacientes.internado','consultas.paciente_id','pacientes.caso')
            ->where('medicos.id','=',$id)->where('personas.nombre','LIKE','%'.$searchText.'%')
            ->distinct()->paginate(10);
        return $consulta;
    }
}
