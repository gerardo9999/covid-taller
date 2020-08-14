<?php

namespace App\Http\Livewire;

use App\Hospital;
use App\User;
use Illuminate\View\Component as ViewComponent;
use Livewire\Component;

class Usuario extends Component
{
    public $usuario;
    public $hospitales ;
    public function render()
    {
        $this->usuario = User::all();
        $this->hospitales = Hospital::all();
        return view('livewire.usuario');
    }
}
