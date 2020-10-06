<?php

namespace App\Http\Livewire;

use App\Municipio;
use Livewire\Component;
use Livewire\WithPagination;

class Municipios extends Component{
    public $searchText;
    use WithPagination;

    public function render(){

        $searchText = '%'.$this->searchText.'%';

        return view('livewire.municipios',[
                'municipios' => Municipio::join('provincias','provincias.id','=','municipios.provincia_id')
                ->select('municipios.id', 'municipios.provincia_id',
                         'provincias.nombre as provincia',
                         'municipios.nombre as municipio')->orderBy('municipios.id','desc')
                         ->where('municipios.nombre','LIKE','%'.$searchText.'%')
                         ->orWhere('provincias.nombre','LIKE','%'.$searchText.'%')
                         ->orderBy('municipios.id','asc')
                    ->paginate(10)
            
        ]);
    }
}
