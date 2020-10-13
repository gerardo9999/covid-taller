<?php

namespace App\Http\Livewire;

use App\Persona;
use App\Examen;
use App\Consulta;
use App\Paciente;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Pacientes extends Component
{
    public $lista = 1;
    public $perfil = 0;
    public $searchText; 
    public $paciente_id = null;
    public $consultaPacientes;
    use WithPagination;

    public function render(){

        $paciente_id = $this->paciente_id;
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.pacientes',[
                'pacientes' => Paciente::pacientes($searchText),
        ]);
    }


    public function buscarDatosPaciente(){
        $paciente = Paciente::findOrFail($this->paciente_id);
    }

    public function mostrarPerfil($id){
        $this->perfil = 1;
        $this->lista = 0;
        $this->paciente_id = $id;

    }
    public function mostrarLista(){
        $this->perfil = 0;
        $this->lista = 1;
    }
    public function consultasPaciente(){
        $consultas= Consulta::join('examenes','examenes.consulta_id','consultas.id')
                                    ->join('pacientes','pacientes.id','=','consultas.paciente_id')
                                    ->where('pacientes.id','=',$this->paciente_id)->get();

        $this->consultaPacientes = $consultas;
               
    }
    public function mostrarListaPacientes(){
        $this->lista=1;
        $this->perfil=0;
    }
}
