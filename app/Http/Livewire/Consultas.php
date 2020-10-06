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
    
    public $searchText ;
    public $lista = 1;
    
    
    //lista de la prescripcion medica
    public $listaPrescripcion = 0;
    
    public $paciente = 0;
    public $formulario = 0;
    public $user;


    // variables de la tabla examen
    public $descripcion_examen;

    //lista examenes
    public $listaExamenes= 0;
    //id de la prescripcion 
    public $prescripcion_id;
    
    //Muestra el formulario para actualizar
    public $actualizarPrescripcion=0;

    //Para ek formulario de editar
    public $editarPrescripcion = 0;

    public $paciente_id;
    public $consulta;

    // atributos de la prescripcion
    public $medicamento;
    public $cantidad_producto;
    public $indicaciones;


    public $diagnostico_id;

    //atributos de diagnostico
    public $descripcion_medica;
    public $evolucion_enfermedad;


    //muestra el formulario
    public $actualizarDiagnosico = 0;


    public $informacionConsulta = 0;
    public $diagnicosMedico     = 0;
    public $prescripcion        = 0;


    // 62046139
    //public tipo Examen
    public $tipoExamen;

    public function render(){

        $searchText = $this->searchText;
        return view('livewire.consultas',[
            'consultas'=> Consulta::where('consultas.fecha_programada','=',$searchText)->paginate(10),
        ]);
    }

    public function mostrarFormulario(){
        $this->formulario= 1;
        $this->lista = 0;
        $this->paciente = 0;

    }
    //muestra el formulario de consultas
    public function mostrarFormularioConsulta($id){
        $this->mostrarFormulario();
        $this->consulta = $id;
    }
    public function mostrarlistaPrescripcion(){
        $this->listaPrescripcion = 1 ;
    }
    
    public function mostrarFormularioPrescripcion(){
        $this->resetearPrescripcion();
        $this->listaPrescripcion = 0 ;
        $this->actualizarPrescripcion = 0;

    }
    public function mostrarlistaDiagnostico(){
        $this->actualizarDiagnosico = 0;
    }
    public function mostrarPaciente($paciente_id){
        $this->paciente_id = $paciente_id;
        
        $this->paciente= 1;
        $this->lista = 0;
        $this->formulario = 0;
    }
    public function mostrarLista(){
        $this->paciente= 0;
        $this->lista = 1;
        $this->formulario = 0;
    }
    public function authUser(){
        $user = $this->user;
    }
    public function mostrarFormularioInformacion($consulta){
        $this->informacionConsulta = 1;
        $this->diagnicosMedico = 0;
        $this->actualizarDiagnosico = 0;
        $this->prescripcion = 0 ;

        $this->consulta = $consulta;
    }
    public function mostrarFormularioDiagnostico($consulta){
        $this->diagnicosMedico = 1;
        $this->informacionConsulta = 0;
        $this->prescripcion         = 0;
        $this->consulta = $consulta;
        $this->listaExamenes = 1;
    }
    public function mostrarFormularioPrescripcionExiste($consulta){
        $this->resetearPrescripcion();

        $this->prescripcion         = 1;
        $this->diagnicosMedico      = 0;
        $this->informacionConsulta  = 0;
        $this->actualizarDiagnosico =0;
        $this->consulta = $consulta;
        $this->listaExamenes = 1;

        

    }
    public function guardarDiagnosticoMedico(){
        
        $diagnostico = new Diagnostico();
        $diagnostico->descripcion = $this->descripcion_medica; 
        $diagnostico->evolucion_enfermedad = $this->evolucion_enfermedad; 
        $diagnostico->consulta_id = $this->consulta;
        $diagnostico->save();
    }
    public function resetearPrescripcion(){
        $this->indicaciones = '';
        $this->cantidad_producto = 0;
    }
    public function guardarPrescripcionMedica(){
        
        $prescripcion = new Prescripcion();
        $prescripcion->medicamento= $this->medicamento;
        $prescripcion->cantidad_producto= $this->cantidad_producto;
        $prescripcion->indicaciones= $this->indicaciones;
        $prescripcion->consulta_id= $this->consulta;
        $prescripcion->save();

        $this->listaPrescripcion = 1;
        $this->actualizarPrescripcionMedica = 0;
        $this->resetearPrescripcion();
    }
    public function actualizarDiagnosticoMedico(){
        $diagnostico = Diagnostico::findOrFail($this->diagnostico_id);
        $diagnostico->descripcion = $this->descripcion_medica; 
        $diagnostico->evolucion_enfermedad = $this->evolucion_enfermedad; 
        $diagnostico->consulta_id = $this->consulta;
        $diagnostico->update();

        $this->actualizarDiagnosico = 0;

    }
    //mostrar editar diagnostico
    public function mostrarEditarDiagnostico($diagnostico_id){
        $this->actualizarDiagnosico = 1;
        $this->diagnostico_id = $diagnostico_id;

        $diagnostico = Diagnostico::findOrFail($this->diagnostico_id);
        $this->descripcion_medica = $diagnostico->descripcion;
        $this->evolucion_enfermedad = $diagnostico->evolucion_enfermedad;




    }
    public function mostrarEditarPrescripcion($prescripcion_id){

        $this->editarPrescripcion = 1;
        $prescripcion = Prescripcion::findOrFail($prescripcion_id);
        $this->prescripcion_id = $prescripcion_id; 
        $this->indicaciones = $prescripcion->indicaciones ;
        $this->cantidad_producto = $prescripcion->cantidad_producto;
        $this->listaPrescripcion = 0;
        $this->actualizarPrescripcion = 1;
    }
    public function actualizarPrescripcionMedica(){

        $prescripcion = Prescripcion::findOrFail($this->prescripcion_id);
        $prescripcion->indicaciones = $this->indicaciones;  
        $prescripcion->cantidad_producto = $this->cantidad_producto;  
        $prescripcion->save();
        $this->listaPrescripcion = 1;
        $this->actualizarPrescripcionMedica = 0;
        $this->resetearPrescripcion();

    }
    public function eliminarPrescripcion($prescripcion_id){
        $prescripcion = Prescripcion::findOrFail($prescripcion_id);
        $prescripcion->delete();
    }

    public function setTipoExamen( $item_id ){
       $this->tipoExamen= $item_id;

    }
    //guarda los examenes medicos
    public function guardarExamenMedico(){
        $examen = new Examen();
        $examen->fecha_realizado = date('Y-m-d');
        $examen->estado = 0;
        $examen->descripcion = $this->descripcion_examen;
        $examen->consulta_id = $this->consulta;
        $examen->tipo_id = $this->tipoExamen;
        $examen->save(); 

        $this->listaExamenes =1;
    }

    // muestra el formulario de examenes
    public function mostrarFormularioExamenes(){
        $this->listaExamenes = 0;
    }

    
}

