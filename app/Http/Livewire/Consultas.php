<?php

namespace App\Http\Livewire;

use App\Consulta;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Consultas extends Component
{
    public $searchText ;
    public $lista = 1;
    public $paciente = 0;
    public $medico = 0;
    public $user;
    public $paciente_id;

    public function render(){
        $paciente_id = $this->paciente_id;
        $searchText = $this->searchText;
        return view('livewire.consultas',[
            'consultas'=> Consulta::where('consultas.fecha_registrada','=',$searchText)->paginate(10),
            
            




        ]);
    }
    public function mostrarMedico(){
        $this->medico= 1;
        $this->lista = 0;
        $this->paciente = 0;

    }
    public function mostrarPaciente($paciente_id){
        $this->paciente_id = $paciente_id;
        
        
        $this->paciente= 1;
        $this->lista = 0;
        $this->medico = 0;

    }

    public function mostrarLista(){
        $this->paciente= 0;
        $this->lista = 1;
        $this->medico = 0;
    }
    public function authUser(){
        $user = $this->user;
    }


}

