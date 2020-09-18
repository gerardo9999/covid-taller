<?php

namespace App\Http\Livewire;

use App\Hospital;
use Livewire\Component;
use Livewire\WithPagination;

class Hospitales extends Component
{
    use WithPagination;
    public $searchText; 
    public function render()
    {
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.hospitales',[
                'hospitales' => Hospital::select('id','nombre','telefono','imagen','nivel')
                ->where('nombre','LIKE','%'.$searchText.'%')
                ->orWhere('nivel','LIKE','%'.$searchText.'%')
                ->paginate(20)
        
        ]);
    }
}
