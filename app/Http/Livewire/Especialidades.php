<?php

namespace App\Http\Livewire;

use App\Especialidad;
use Livewire\Component;
use Livewire\WithPagination;

class Especialidades extends Component{

    use WithPagination;
    public $searchText;
    
    public function render(){

        $searchText = '%'.$this->searchText.'%';
        return view('livewire.especialidades',[
            'especialidades'=> Especialidad::especialidades($searchText)
        ]);
    }
    
}
