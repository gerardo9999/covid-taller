<?php

namespace App\Http\Livewire;

use App\Pregunta;
use Livewire\Component;

class Preguntas extends Component
{
    public $mensajeUbicacion = 'Necesitamos que escribas tu ubicacion';

    public $formulario = 1;


    public function render()
    {
        return view('livewire.preguntas');
    }

    public function pasos(){
        $this->formulario = 3;
        return $this->formulario;
    }
}
