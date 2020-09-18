<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Consulta;
use Livewire\Component;
use Livewire\WithPagination;

class Consultas extends Component{

    use WithPagination;

    public $fecha_consulta;
    // public $id = Auth::id();


    public function render(){
        $fecha_consulta =  $this->fecha_consulta;
        return view('livewire.consultas',[
            'consultas' => Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
                                    ->join('medicos','medicos.id','=','consultas.medico_id')
                                    ->select('consultas.estado_consulta',
                                             'consultas.motivo_consulta',
                                             'consultas.evolucion_enfermedad',
                                             'consultas.fecha_consulta',
                                             'consultas.fecha_programada'
                                             )->where('consultas.fecha_consulta','=',$fecha_consulta)
                                    ->paginate(10),           
        ]);

    }

    public function mostrarFormulario(){
        $this->formulario=true;
    }

    public function mostrarLista_medico(){
        $this->lista_medico=true;
        $this->formulario_consulta=false;
    }
    
    public function mostrarLista_paciente(){
        $this->lista_paciente=true;
        $this->formulario_consulta=false;
    }

    // $table->integer('estado_consulta')->default(1);
    // $table->string('evolucion_enfermedad');
    // $table->string('motivo_consulta');

    // $table->date('fecha_consulta');
    // $table->date('fecha_programada');


    // $table->integer('paciente_id')->unsigned();
    // $table->integer('medico_id')->unsigned();


}
