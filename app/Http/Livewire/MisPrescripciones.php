<?php

namespace App\Http\Livewire;

use App\Paciente;
use Livewire\Component;

class MisPrescripciones extends Component{

    public $searchText;
    public function render(){
        $searchText = '%'.$this->searchText.'%';

        return view('livewire.mis-prescripciones',[
            'prescripciones'=> Paciente::misPrescripciones($searchText)
        ]);
    }
}
 