<?php

namespace App\Http\Livewire;

use App\Consulta;
use App\Persona;
use App\Paciente;
use App\Medico;
use App\Ubicacion;
use App\Hospital;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MisPacientes extends Component{

    public $searchText ;
    public $listaMisPacientes     = 1;
    public $consultaFormulario    = 0;
    public $internadoFormulario   = 0;
    public $tratamientoFormulario = 0;

    public $medico_id = null;
    public $medico_nombre    =  null;
    public $medico_apellido  =  null;

    public $hospital_id  = null;
    public $hospital     = null;

    public $paciente_id        =  null;
    public $paciente_nombre    =  null;
    public $paciente_apellido  =  null;

 

    // variables de consulta

    public $hora_programada  = null;
    public $fecha_programada = null;
    public $motivo_consulta  = null;
    
    // variables de internado
    public $numero_cama = null;
    public $numero_sala = null;

    public function render(){
        $searchText = '%'.$this->searchText.'%';
        return view('livewire.mis-pacientes',[
            'pacientes' => Consulta::misPacientes($searchText)
        ]);
    }
    
    public function mostrarListaPacientes(){
        $this->listaMisPacientes = 1;
    }
    public function ocultarListaPacientes(){
        $this->listaMisPacientes = 0;
    }

    public function mostrarFormularioInternado(){
        $this->internadoFormulario = 1;
    }
    public function ocultarFormularioInternado(){
        $this->internadoFormulario = 0;
    }

    public function mostrarFormularioConsulta(){
        $this->consultaFormulario = 1;
    }
    public function ocultarFormularioConsulta(){
        $this->consultaFormulario = 0;
    }

    public function mostrarFormularioTratamiento(){
        $this->consultaFormulario = 1;
    }
    public function ocultarFormularioTratamiento(){
        $this->consultaFormulario = 0;
    }

    public function datosPaciente($paciente_id){
        $this->paciente_id = $paciente_id;
        $persona                 = Persona::findOrFail($this->paciente_id);
        $this->paciente_nombre   = $persona->nombre; 
        $this->paciente_apellido = $persona->apellidos; 
    }

    public function datosMedico(){


        $medico = Medico::find($this->medico_id);
        $this->hospital_id = $medico->hospital_id;

        $persona = Persona::findOrFail($this->medico_id);
        $this->medico_nombre   = $persona->nombre; 
        $this->medico_apellido = $persona->apellidos;
         
    }

    public function datosHospital(){
        $hospital = Hospital::findOrFail($this->hospital_id);
        $this->hospital = $hospital->nombre;
    }




    public function formularioConsulta($paciente_id){
        $this->medico_id = Medico::autenticado();
        $this->datosMedico();
        $this->datosHospital();
        

        $this->ocultarListaPacientes();
        $this->mostrarFormularioConsulta();

        $this->datosPaciente($paciente_id);


    }
    public function guardarConsulta(){
        $this->medico_id = Medico::autenticado();

        $consulta = new Consulta();
        $consulta->estado_consulta = 1;  // espera 
        $consulta->motivo_consulta = $this->motivo_consulta; 

        $consulta->fecha_registrada = date('Y-m-d'); 
        $consulta->hora_programada = $this->hora_programada;
        $fecha_programada = date("Y-m-d",strtotime($this->fecha_programada));
        $consulta->fecha_programada  = $fecha_programada;
        $consulta->paciente_id = $this->paciente_id; 
        $consulta->medico_id = $this->medico_id; 
        $consulta->save();

        $this->ocultarFormularioConsulta();
        $this->mostrarListaPacientes();
        $this->resetearConsulta();
        $this->resetearDatosPaciente();
    }
    public function cancelarConsulta(){
        $this->ocultarFormularioConsulta();
        $this->mostrarListaPacientes();
        $this->resetearConsulta();
        $this->resetearDatosPaciente();
    }
    public function resetearConsulta(){
        $this->motivo_consulta  = null;
        $this->fecha_programada = null;
        $this->hora_programada  = null;
    }
    public function resetearDatosPaciente(){
        $this->paciente_id  = null;
        $this->nombre       = null;
        $this->apellidos    = null;
    }

    public function formularioInternado($paciente_id){
        
        $this->datosPaciente($paciente_id);
        $this->medico_id = Medico::autenticado();
        $this->datosMedico();


    }

    // Para internar
    public function formularioInternar($paciente_id){
        $this->medico_id = Medico::autenticado();
        $this->datosMedico();
        $this->datosHospital();
        

        $this->ocultarListaPacientes();
        $this->mostrarFormularioInternado();
        $this->datosPaciente($paciente_id); 
    }
    public function guardarPacienteInternado(){
        
        $this->validate([
            'numero_sala' => 'required',
            'numero_cama' => 'required'
        ]);

      

        

            $ubicacion = new Ubicacion();
            $ubicacion->numero_sala = $this->numero_sala;
            $ubicacion->numero_cama = $this->numero_cama;
            $ubicacion->paciente_id = $this->paciente_id;
            $ubicacion->hospital_id = $this->hospital_id;
            $ubicacion->save();

            $paciente = Paciente::findOrFail($this->paciente_id);
            $paciente->internado = 1;
            $paciente->update();
        

        $this->ocultarFormularioInternado();
        $this->mostrarListaPacientes();
        $this->resetearDatosPaciente();
        $this->resetearInternado();
    }

    public function resetearInternado(){
        $this->numero_cama = null;
        $this->numero_sala = null;
    }

    public function cancelarPacienteInternado(){
        $this->ocultarFormularioInternado();
        $this->mostrarListaPacientes();
        $this->resetearDatosPaciente();
        $this->resetearInternado();
    }

}
