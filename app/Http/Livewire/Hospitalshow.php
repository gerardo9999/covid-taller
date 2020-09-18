<?php

namespace App\Http\Livewire;

use App\Hospital;
use Livewire\Component;

class Hospitalshow extends Component
{
    
    public $searchText;
    public $categoria_id;
    public $nombre;
    public $searchTextCategoria;


    public function render()
    {

        return view('livewire.hospitalshow');

    }
}
