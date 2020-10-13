<?php

namespace App\Http\Livewire;

use App\Especialidad;
use App\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class Medicos extends Component{
    
    use WithPagination;
    public $searchText;
    
    public function render(){
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.medicos',[
            'medicos'=> Persona::join('medicos','medicos.id','=','personas.id')
            ->join('users','users.id','personas.id')
            ->where('personas.nombre','LIKE','%'.$searchText.'%')
            ->paginate(10)
        ]);
    }
}
