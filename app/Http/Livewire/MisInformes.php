<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MisInformes extends Component
{
    
    public $paciente_id ;
    public $informeTratamiento = 0;
    public $informeConsulta    = 0;
    public $informeSeguimiento = 0;
    public $informeExamen      = 0;

    public function render(){
        return view('livewire.mis-informes');
    }

    public function informeSeguimientos($paciente_id){
        $this->paciente_id = $paciente_id;
        $this->informeSeguimiento = 1;
        $this->informeConsulta    = 0;
        $this->informeTratamiento = 0;
        $this->informeExamen      = 0;
    }
    public function informeTratamientos($paciente_id){
        $this->paciente_id = $paciente_id;

        $this->informeSeguimiento = 0;
        $this->informeConsulta    = 0;
        $this->informeTratamiento = 1;
        $this->informeExamen      = 0;
    }
    public function informeConsultas($paciente_id){
        $this->paciente_id = $paciente_id;

        $this->informeSeguimiento = 0;
        $this->informeConsulta    = 1;
        $this->informeTratamiento = 0;
        $this->informeExamen      = 0;
    }
    public function informeExamenes($paciente_id){
        $this->paciente_id = $paciente_id;

        $this->informeSeguimiento = 0;
        $this->informeConsulta    = 0;
        $this->informeTratamiento = 0;
        $this->informeExamen      = 1;
    }    

}
