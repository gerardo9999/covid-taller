<?php

namespace App\Http\Livewire;

use App\Medicamento;
use App\MedicamentoTratamiento;
use App\Tratamiento;
use ArrayObject;
use Livewire\Component;


class Tratamientos extends Component
{


    //Variables importantes
    public $medicamento_id = null; 
    public $nombreMedicamento = null ;

    public $cantidad =  null;
    public $indicacion = null;

    public $arrayMedicamento = [];

    public $i = null;

    public $modalTitle;

    public $nombreTratamiento = null;

    public $lista = 1;
    public $create = 0;
    
    
    //para mostrar los medicamentos
    public $listaMedicamento = 0 ;
    public $createIndicacion = 0 ;





    public $searchText;
    public $searchTextMedicamento;
    
    public function render(){
        $searchText = '%'.$this->searchText.'%';
        $searchTextMedicamento = '%'.$this->searchTextMedicamento.'%';

        return view('livewire.tratamientos',[
            'tratamientos'=> Tratamiento::tratamientos($searchText),
            'medicamentos' => Medicamento::where('medicamentos.nombre','LIKE','%'.$searchTextMedicamento.'%')->paginate(10)
        ]);

    }
    public function mostrarLista(){
        $this->lista = 1;
    }
    public function ocultarLista(){
        $this->lista = 0;
    }
    public function mostrarCreate(){
        $this->create = 1;
    }
    public function ocultarCreate(){
        $this->create = 0;
    }



    public function mostrarFormulario(){
        $this->mostrarCreate();
        $this->ocultarLista();
    }

    public function ocultarFormulario(){
        $this->ocultarCreate();
        $this->mostrarLista();
    }

    public function mostrarListaMedicamento(){
        $this->listaMedicamento = 1;
    }

    public function ocultarListaMedicamento(){
        $this->listaMedicamento = 0;
    }

    public function mostrarCreateIndicacion(){
        $this->createIndicacion = 1;
    }
    public function ocultarCreateIndicacion(){
        $this->createIndicacion = 0;
    }

    public function accionCrear(){
        $this->modalTitle ='Agregar Medicamento';
        $this->mostrarListaMedicamento();
        $this->ocultarCreateIndicacion();

        $this->resetearVariable();
    }
    //mostrara el formulario para agregar las indicaciones del tratamiento
    public function formularioIndicaciones($medicamento_id){
        
        $this->ocultarListaMedicamento();
        $this->mostrarCreateIndicacion();

        $medicamento = Medicamento::findOrFail($medicamento_id);


        $this->medicamento_id = $medicamento_id;
        $this->nombreMedicamento = $medicamento->nombre;

    }

    public function resetearVariable(){
        $this->cantidad = null;
        $this->indicacion = null;
        $this->medicamento_id = null;
    }

    public function agregarDetalle(){

        array_push($this->arrayMedicamento,[
            "medicamento_id"        => $this->medicamento_id,
            "medicamento"           => $this->nombreMedicamento,
            "cantidad"              => $this->cantidad,
            "indicacion"            => $this->indicacion
        ]); 

        $this->ocultarCreateIndicacion();
        $this->mostrarListaMedicamento();
        $this->resetearVariable();
    }

    public function eliminarMedicamentoDetalle( $elemento ){
        $this->i = $elemento;


        // unset($this->arrayMedicamento[$elemento]);
        
        $arrayAuxiliar = new ArrayObject($this->arrayMedicamento);
        $this->arrayMedicamento = [];

        
        $c = count($arrayAuxiliar);
        for ($i=0; $i < $c ; $i++) { 
            if($i != $elemento)
            array_push($this->arrayMedicamento,[
                "medicamento_id"        => $arrayAuxiliar[$i]["medicamento_id"],
                "medicamento"           => $arrayAuxiliar[$i]["medicamento"],
                "cantidad"              => $arrayAuxiliar[$i]["cantidad"],
                "indicacion"            => $arrayAuxiliar[$i]["indicacion"]
            ]);
        }

    }
    public function guardarTratamiento(){
        
        $this->validate([
            'nombreTratamiento'=>'required',
            'arrayMedicamento' => 'required'
        ]);

        $c = count($this->arrayMedicamento);


        $tratamiento = new Tratamiento();
        $tratamiento->nombre = $this->nombreTratamiento;
        $tratamiento->save();

        for ($i=0; $i < $c; $i++) { 
            $medicamento_tratamiento = new MedicamentoTratamiento();
            $medicamento_tratamiento->cantidad = $this->arrayMedicamento[$i]["cantidad"];
            $medicamento_tratamiento->indicaciones = $this->arrayMedicamento[$i]["indicacion"];
            $medicamento_tratamiento->tratamiento_id = $tratamiento->id;
            $medicamento_tratamiento->medicamento_id = $this->arrayMedicamento[$i]["medicamento_id"];
            $medicamento_tratamiento->save();
        }

        session()->flash('message', 'Post successfully updated.');

        $this->ocultarCreate();
        $this->mostrarLista();        
      



        
    }

    public function validarFormulario(){

    }


    public function cargarArray($elemento){

        $n = count($this->arrayMedicamento);
        $arrayAuxiliar = [];
        

        for ($i=0; $i < $n; $i++) { 
            if($i != $elemento )
            array_push($arrayAuxiliar,$this->arrayMedicamento); 
        }

        $this->arrayMedicamento = null;
        $this->arrayMedicamento =  $arrayAuxiliar;
    }

}
