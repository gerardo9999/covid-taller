<?php

namespace App\Http\Livewire;

use App\Medicamento;
use Livewire\Component;

class Medicamentos extends Component{
    
    public $searchText;

    public function render(){
        $searchText = '%'.$this->searchText.'%';
        
        return view('livewire.medicamentos',[
            'medicamentos' =>  Medicamento::where('medicamentos.nombre','LIKE','%'.$searchText.'%')
            ->paginate(10)
        ]);
    }


}
