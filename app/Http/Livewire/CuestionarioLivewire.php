<?php

namespace App\Http\Livewire;

use App\Cuestionario;
use Livewire\Component;

class CuestionarioLivewire extends Component
{
    public function render()
    {
        return view('livewire.cuestionario-livewire',[
            'preguntas'=> Cuestionario::all()
        ]);
    }
}
