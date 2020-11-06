<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReporteProvincia extends Component
{
    public $provincia_id ;
    public function render()
    {
        return view('livewire.reporte-provincia');
    }
    public function mount($provincia_id){
        'provincia_id' = $provincia_id;
    }
}
