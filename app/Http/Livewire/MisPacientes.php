<?php

namespace App\Http\Livewire;

use App\Consulta;
use Livewire\Component;

class MisPacientes extends Component{

    public $searchText;

    public function render(){
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.mis-pacientes',[
            'pacientes' => Consulta::misPacientes($searchText)
        ]);
    }
}
