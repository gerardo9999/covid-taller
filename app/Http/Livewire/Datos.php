<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Datos extends Component
{

    public $nombre='';
    public $apellidos='';


    public function render(){
        return view('livewire.page.datos');
    }

    public function guardarDatos(){
        

        validator();
    }
}
