<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReporteDiario extends Component{

    public $chartProvincia = 0;
    public $chartMunicipio = 0;
    public $chart = 1;

    public function render()
    {
        return view('livewire.reporte-diario',[

        ]);
    }

    public function mostrarProvincia(){
        $this->chartProvincia = 1;
    }

}
