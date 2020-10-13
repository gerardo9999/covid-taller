<?php

namespace App\Http\Livewire;

use App\Consulta;
use App\Diagnostico;
use App\Examen;
use App\Prescripcion;
use App\TipoExamen;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Consultas extends Component{


    public $lista             = 1;
    public $listaExamen       = 0;
    public $listaPrescripcion = 0;
    public $listaDiagnostico  = 0;


    public $formulario              = 0;
    public $formularioExamen        = 0;
    public $formularioPrescripcion  = 0;
    public $formularioDiagnostico   = 0;


    //muestra el formulario
    public $formularioDiagnosicoActualizar = 0;
    public $formularioPrescripcionActualizar = 0;

    public $searchText ;

    // variables de la tabla examen
    public $tipoExamen          = null;
    public $descripcion_examen  = null;

    //atributos de diagnostico
    public $descripcion_medica   = null;
    public $evolucion_enfermedad = null;
    public $diagnostico_id = null;


    // atributos de la prescripcion
    public $medicamento       = null;
    public $cantidad_producto = null;
    public $indicaciones      = null;
    public $consulta_id       = null;
    public $prescripcion_id   = null;





    
    //lista de la prescripcion medica
    
    public $paciente = 0;
    public $user;






    public $paciente_id;


    











    public function render(){

        $searchText = $this->searchText;
        return view('livewire.consultas',[
            'consultas'=> Consulta::mostrarConsultas($searchText),
        ]);
    }
    public function mostrarLista(){
        $this->lista = 1;
    }
    public function ocultarLista(){
        $this->lista = 0;
    }
    public function mostrarListaExamen(){
        $this->listaExamen =1;
    }
    public function mostrarlistaDiagnostico(){
        $this->listaDiagnostico = 1;
    }
    public function mostrarlistaPrescripcion(){
        $this->listaPrescripcion = 1;
    }
    public function ocultarListaExamen(){
        $this->listaExamen =0;
    }
    public function ocultarlistaDiagnostico(){
        $this->listaDiagnostico = 0;
    }
    public function ocultarlistaPrescripcion(){
        $this->listaPrescripcion = 0;
    }


    public function ocultarFormulario(){
        $this->formulario= 0;
    }
    public function mostrarFormulario(){
        $this->formulario= 1;
    }
    public function mostrarFormularioExamen(){
        $this->formularioExamen = 1;
    }
    public function ocultarFormularioExamen(){
        $this->formularioExamen = 0;
    }

    public function mostrarFormularioDiagnostico(){
        $this->formularioDiagnostico = 1;
    }
    public function ocultarFormularioDiagnostico(){
        $this->formularioDiagnostico = 0;
    }
    public function mostrarFormularioPrescripcion(){
        $this->formularioPrescripcion = 1;
    }
    public function ocultarFormularioPrescripcion(){
        $this->formularioPrescripcion = 0;
    }
    public function mostrarFormularioDiagnosticoActualizar(){
        $this->formularioDiagnosicoActualizar = 1; 
    }
    public function ocultarFormularioDiagnosticoActualizar(){
        $this->formularioDiagnosicoActualizar = 0; 
    }
    //Examenes medicos
    public function examenLista(){
        $this->mostrarListaExamen();
        $this->ocultarFormularioExamen();
        
        $this->ocultarlistaDiagnostico();
        $this->ocultarFormularioDiagnostico();


        $this->ocultarlistaPrescripcion();
        $this->ocultarFormularioPrescripcion();
    }
    public function examenFormulario(){
        $this->mostrarFormularioExamen();
        $this->ocultarListaExamen();
    }
    public function guardarExamenMedico(){
        
            if($this->tipoExamen == "Seleccione un examen medico"){
                $this->tipoExamen = null;
            }
            if($this->tipoExamen != null){
                $tipoExamen = TipoExamen::where('nombre','=',$this->tipoExamen)->get();
                $tipo_id = $tipoExamen[0]->id;
            }
            $this->validate([
                'tipoExamen'=>'required',
                'descripcion_examen'=>'required'
            ]);
        
            $examen = new Examen();
            $examen->fecha_realizado = date('Y-m-d');
            $examen->estado = 0;
            $examen->descripcion = $this->descripcion_examen;
            $examen->consulta_id = $this->consulta_id;
            $examen->tipo_id = $tipo_id;
            $examen->save(); 

            $this->ocultarFormularioExamen();
            $this->mostrarListaExamen();
            $this->resetearExamen();
    }
    public function resetearExamen(){
         $this->tipoExamen          = null;
         $this->descripcion_examen  = null;
    }
    public function eliminarExamenMedico($examen_id){
        $examen =  Examen::findOrFail($examen_id);
        $examen->delete();
    }
    // Diagnosticos
    public function diagnosticoLista(){
        $this->mostrarlistaDiagnostico();
        $this->ocultarFormularioDiagnostico();

        $this->ocultarListaExamen();
        $this->ocultarFormularioExamen();

        $this->ocultarlistaPrescripcion();
        $this->ocultarFormularioPrescripcion();
    }
    public function diagnosticoFormulario(){
        
        $this->mostrarFormularioDiagnostico();
        $this->ocultarlistaDiagnostico();
    }
    public function validarDiagnostico(){
        $this->validate([
            'descripcion_medica'   => 'required',
            'evolucion_enfermedad' => 'required'
        ]);
    }
    public function guardarDiagnosticoMedico(){
        
        $this->validarDiagnostico();


        $diagnostico = new Diagnostico();
        $diagnostico->descripcion = $this->descripcion_medica; 
        $diagnostico->evolucion_enfermedad = $this->evolucion_enfermedad; 
        $diagnostico->consulta_id = $this->consulta_id;
        $diagnostico->save();

        $this->mostrarlistaDiagnostico();
        $this->ocultarFormularioPrescripcion();
        $this->ocultarFormularioDiagnostico();
    }
    public function diagnosticoFormularioActualizar($diagnostico_id){

        $this->diagnostico_id = $diagnostico_id;

        $this->ocultarlistaDiagnostico();
        $this->mostrarFormularioDiagnostico();
        $this->mostrarFormularioDiagnosticoActualizar();
    }

    public function actualizarDiagnosticoMedico(){
        
        $this->validarDiagnostico();

        $diagnostico = Diagnostico::findOrFail($this->diagnostico_id);
        $diagnostico->descripcion = $this->descripcion_medica; 
        $diagnostico->evolucion_enfermedad = $this->evolucion_enfermedad; 
        $diagnostico->consulta_id = $this->consulta_id;
        $diagnostico->update();

        $this->mostrarlistaDiagnostico();
        $this->ocultarFormularioDiagnosticoActualizar();
        $this->ocultarFormularioDiagnostico();
    }
    //Prescripciones
    public function mostrarFormularioPrescripcionActualizar(){
        $this->formularioPrescripcionActualizar = 1; 
    }
    public function ocultarFormularioPrescripcionActualizar(){
        $this->formularioPrescripcionActualizar = 0; 
    }

    public function prescripcionLista(){
        $this->ocultarFormularioDiagnostico();
        $this->ocultarlistaDiagnostico();

        $this->ocultarListaExamen();
        $this->ocultarFormularioExamen();

        $this->mostrarlistaPrescripcion();
        $this->ocultarFormularioPrescripcion();
    }
    public function prescripcionFormulario(){
        $this->mostrarFormularioPrescripcion();
        $this->ocultarListaPrescripcion();   
    }
    public function validarPrescripcion(){
        
        $data = [
          'medicamento'        => 'required',
          'cantidad_producto'  => 'required',
          'indicaciones'       => 'required',
          'consulta_id'        => 'required'
        ];

        $this->validate($data);
    }
    public function resetearPrescripcion(){
        $this->medicamento       =  null;
        $this->cantidad_producto =  null;
        $this->indicaciones      =  null;
    }
    public function guardarPrescripcionMedica(){
        
        $this->validarPrescripcion();

        $prescripcion                    = new Prescripcion();
        $prescripcion->medicamento       = $this->medicamento;
        $prescripcion->cantidad_producto = $this->cantidad_producto;
        $prescripcion->indicaciones      = $this->indicaciones;
        $prescripcion->consulta_id       = $this->consulta_id;
        $prescripcion->save();


        $this->resetearPrescripcion();
        $this->mostrarlistaPrescripcion();
        $this->ocultarFormularioPrescripcion();
    }
    public function mostrarFormularioConsulta($consulta_id){
        $this->mostrarFormulario();
        $this->ocultarLista();
        $this->consulta_id = $consulta_id;
    }
    public function buscarPrescripcion(){
        $prescripcion = Prescripcion::findOrFail($this->prescripcion_id);
        $this->medicamento =  $prescripcion->medicamento;
        $this->cantidad_producto = $prescripcion->cantidad_producto;
        $this->indicaciones = $prescripcion->indicaciones;
    }
    public function prescripcionFormularioActualizar($prescripcion_id){
        
        $this->prescripcion_id = $prescripcion_id;
        $this->buscarPrescripcion();
        $this->mostrarFormularioPrescripcionActualizar();
        $this->mostrarFormularioPrescripcion();
        $this->ocultarlistaPrescripcion();
    }
    public function actualizarPrescripcionMedico(){
        
        $prescripcion = Prescripcion::findOrFail($this->prescripcion_id);
        $prescripcion->medicamento = $this->medicamento;
        $prescripcion->cantidad_producto = $this->cantidad_producto;
        $prescripcion->indicaciones = $this->indicaciones;
        $prescripcion->update();

        $this->mostrarlistaPrescripcion();
        $this->ocultarFormularioPrescripcion();
        $this->resetearPrescripcion();
    }
    public function eliminarPrescripcionMedica($prescripcion_id){
        $prescripcion = Prescripcion::findOrFail($prescripcion_id);
        $prescripcion->delete();
    }
    public function finalizarConsultaMedica(){
        $consulta = Consulta::findOrFail($this->consulta_id);
        $consulta->estado_consulta = 2;
        $consulta->update();
        
        $this->ocultarFormulario();
        $this->mostrarLista();

    }
}