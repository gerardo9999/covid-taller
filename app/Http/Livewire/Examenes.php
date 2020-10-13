<?php

namespace App\Http\Livewire;

use App\Caso;
use App\Consulta;
use App\Examen;
use App\HistorialMedico;
use App\Paciente;
use Livewire\Component;

class Examenes extends Component
{
    
    public $searchText;
    public $descripcion = null;
    public $resultado = null;

    public function render(){

        $searchText = '%'.$this->searchText.'%';
        return view('livewire.examenes',[
            "examenes"=> Examen::join('tipo_examen','tipo_examen.id','=','examenes.tipo_id')
            ->join('consultas','consultas.id','examenes.consulta_id')
            ->join('medicos','medicos.id','=','consultas.medico_id')
            ->join('pacientes','pacientes.id','=','consultas.paciente_id')
            ->join('personas','personas.id','=','pacientes.id')
            ->select(
                     'tipo_examen.id as tipo_id',
                     'tipo_examen.nombre as examen',
                     'examenes.id as examen_id',
                     'examenes.fecha_realizado',
                     'examenes.estado',
                     'examenes.descripcion as descripcion_examen'
            )->where('personas.nombre','LIKE','%'.$searchText.'%')
            ->orWhere('personas.apellidos','LIKE','%'.$searchText.'%')
            ->paginate(10)
        ]);
    }

    public function resetear(){
        $this->descripcion = null;
        $this->resultado   = null;
    }
    public function enviar_resultados($examen_id){
        
        $examen = Examen::findOrFail($examen_id);
        $consulta = Consulta::findOrFail($examen->consulta_id);
        $paciente = Paciente::findOrFail($consulta->paciente_id);


        if($examen->tipo_id == 1 ){

            $examen->fecha_resultado = date('Y-m-d');
            $examen->estado = 1;
            $examen->descripcion = $this->descripcion;
            $examen->resultado   = $this->resultado;
            $examen->update();

            if($this->resultado=="Positivo"){
                $caso = new Caso();
                $caso->estado      = 'confirmados';
                $caso->fecha       = date('Y-m-d');
                $caso->paciente_id = $paciente->id;
                $caso->save();


                $paciente->caso = 'confirmados';
                $paciente->update();


                $historial = new HistorialMedico();
                $historial->enfermedad = 'COVID-19';
                $historial->fecha_registro = date('Y-m-d');
                $historial->paciente_id = $paciente->id;
                $historial->save();
            }else{
                $caso = new Caso();
                $caso->estado      = 'descartados';
                $caso->fecha       = date('Y-m-d');
                $caso->paciente_id = $paciente->id;
                $caso->save();   
                
                $historial = new HistorialMedico();
                $historial->enfermedad = 'COVID-19';
                $historial->fecha_registro = date('Y-m-d');
                $historial->paciente_id = $paciente->id;
                $historial->save();
            }
        }

        if($examen->tipo_id == 2 ){

            $examen->fecha_resultado = date('Y-m-d');
            $examen->estado = 1;
            $examen->descripcion = $this->descripcion;
            $examen->resultado   = $this->resultado;
            $examen->update();

            if($this->resultado=="Negativo"){
                $caso              = new Caso();
                $caso->estado      = 'recuperados';
                $caso->fecha       = date('Y-m-d');
                $caso->paciente_id = $paciente->id;
                $caso->save();

                $paciente->caso = 'recuperados';
                $paciente->internado = 0;
                $paciente->update();

                

            }
        }

    }
}
