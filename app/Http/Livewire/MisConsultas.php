<?php

namespace App\Http\Livewire;

use App\Paciente;
use Livewire\Component;

class MisConsultas extends Component{

    public $searchText;

    public function render(){

        $searchText = '%'.$this->searchText.'%';
        return view('livewire.mis-consultas',[
        
            'consultas' => Paciente::misConsultas($searchText)

        ]);
    }
}
