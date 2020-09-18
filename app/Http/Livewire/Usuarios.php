<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    public $searchText;
    use WithPagination;
    public function render()
    {
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.usuarios',[
            'usuarios'=> User::where('name','LIKE','%'.$searchText.'%')->
            paginate(10)
        ]);
    }
}
