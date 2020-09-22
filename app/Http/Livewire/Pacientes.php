<?php

namespace App\Http\Livewire;

use App\Persona;
use App\Examen;
use App\Consulta;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Pacientes extends Component
{
    public $lista = 1;
    public $perfil = 0;
    public $searchText; 
    public $paciente_id;
    public $consultaPacientes;
    use WithPagination;

    public function render(){

        $paciente_id = $this->paciente_id;
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.pacientes',[
                'pacientes' => Persona::join('pacientes','pacientes.id','=','personas.id')
                                    ->join('users','users.id','personas.id')
                                    ->select('pacientes.id','users.id as user_id','personas.id as persona_id','nombre','apellidos','users.avatar')
                                    ->where('nombre','LIKE','%'.$searchText.'%')
                                    ->orWhere('apellidos','LIKE','%'.$searchText.'%')
                                    ->orWhere('ci','LIKE','%'.$searchText.'%')
                                    ->paginate(10)
                                    
        ]);
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
                                    ->join('pacientes','pacientes.id','=','consultas.paciente_id')->where('pacientes.id','=',3)->get();

        $this->consultaPacientes = $consultas;
               
    }
}
