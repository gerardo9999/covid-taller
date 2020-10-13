<?php

namespace App\Http\Livewire;

use App\Examen;
use App\Paciente;
use Livewire\Component;

class MisExamenes extends Component{

    public $searchText;
    public function render(){
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.mis-examenes',[
            'examenes'=> Paciente::misExamenes($searchText)
        ]);
    }
}
