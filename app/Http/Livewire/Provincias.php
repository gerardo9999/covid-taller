<?php

namespace App\Http\Livewire;

use App\Provincia;
use Livewire\Component;
use Livewire\WithPagination;

class Provincias extends Component{
   
    
    
    public $provincia_id;
    public $provincia ;


    public $lista = 1;
    public $searchText;
    use WithPagination;

    
    
    public function render()
    {
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.provincias',[
            'provincias' => Provincia::select('id','nombre')
            ->where('nombre','LIKE','%'.$searchText.'%')
            ->paginate(10)
        ]);
    }

    public function mostrarInformacion($id){
        $this->lista = 0;
        $this->provincia_id = $id;
        $provincia = Provincia::findOrFail($id);
        $this->provincia = $provincia->nombre;

    }
    public function ocultarInformacion(){
        $this->lista = 1;
    }


}
