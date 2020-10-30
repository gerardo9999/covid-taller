<?php

namespace App\Http\Livewire;

use App\Consulta;
use App\Persona;
use App\Paciente;
use App\Medico;
use App\Ubicacion;
use App\Hospital;
use App\PacienteTratamiento;
use App\Registro;
use App\Seguimiento;
use App\SeguimientoRegistro;
use App\Tratamiento;
use App\UbicacionPaciente;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class MisPacientes extends Component{


    use WithPagination;

    public $seguimientoFormulario = 0;
    public $searchText ;
    public $listaMisPacientes     = 1;
    public $consultaFormulario    = 0;
    public $internadoFormulario   = 0;
    public $tratamientoFormulario = 0;
    public $informeFormulario     = 0;


    public $ListaSeguimiento         = 0;
    public $listaSeguimientoPaciente = 0;
    public $verSeguimiento           = 0;
    public $actSeguimiento           = 0;
    public $listaTratamientosModal   = 1;


    public $medico_id        =  null;
    public $medico_nombre    =  null;
    public $medico_apellido  =  null;


    // atributo tabla paciente
    public $estado_paciente = null;

    public $hospital_id  = null;
    public $hospital     = null;

    public $paciente_id        =  null;
    public $paciente_nombre    =  null;
    public $paciente_apellido  =  null;


    //Variables de Registro
    public $fecha_registro =null;

    // variables del seguimiento 

    public $dias = null; 


    // Variables de tratamiento
    public $tratamiento_id = null;
    public $tratamiento = null;

    // variables de consulta

    public $hora_programada  = null;
    public $fecha_programada = null;
    public $motivo_consulta  = null;

    //Variables de seguiemiento registro
    public $estado_seguimiento = null;
    public $evolucion_enfermedad = null;
    public $seguimiento_registro_id = null;
    
    // variables de internado
    public $numero_cama = null;
    public $numero_sala = null;


    //Variable de seguimientos

    public $seguiemientos = null;
    public $seguimiento_id = null;
    public $etapa =null;



    //Variables de informes 
    public $informeTratamiento = 0;
    public $informeConsulta    = 0;
    public $informeSeguimiento = 0;
    public $informeExamen      = 0;

    //Vairable de Paciente Tratamiento
    public $paciente_tratamiento = null;

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
        $this->tratamientoFormulario = 1;
    }
    public function ocultarFormularioTratamiento(){
        $this->tratamientoFormulario = 0;
    }


    public function mostrarFormularioSeguimiento(){
        $this->seguimientoFormulario = 1;
    }
    public function ocultarFormularioSeguimiento(){
        $this->seguimientoFormulario = 0;
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
            $ubicacion->hospital_id = $this->hospital_id;
            $ubicacion->save();



            $paciente = Paciente::findOrFail($this->paciente_id);
            $paciente->internado = 1;
            $paciente->update();




            $ubicacion_paciente = new UbicacionPaciente();
            $ubicacion_paciente->fecha_asignacion = date('Y-m-d');
            $ubicacion_paciente->fecha_entrada = date('Y-m-d');
            $ubicacion_paciente->paciente_id = $this->paciente_id;
            $ubicacion_paciente->ubicacion_id = $ubicacion->id;
            $ubicacion_paciente->save();



            // $ fecha_asignacion');
            // $table->date('fecha_entrada')->nullable();
            // $table->date('fecha_salida')->nullable();

            // $table->integer('paciente_id')->unsigned();
            // $table->integer('ubicacion_id')->unsigned();

        

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
        $this->resetearSeguimiento();
        $this->resetearTratamiento();
    }

    public function formularioTratamiento($paciente_id){
        $this->medico_id = Medico::autenticado();
        $this->datosMedico();
        $this->datosHospital();


        $this->ocultarListaPacientes();
        $this->mostrarFormularioTratamiento();
        $this->datosPaciente($paciente_id); 
    }
    public function seleccionarTratamiento( $tratamiento_id ){
        $this->tratamiento_id = $tratamiento_id;
        $tratamiento = Tratamiento::findOrFail($tratamiento_id);
        
        $this->tratamiento = $tratamiento->nombre;
    }

    public function cancelarSeleccionarTratamiento(){
        $this->resetearTratamiento();
    }
    public function resetearTratamiento(){
        $this->tratamiento    = null;
        $this->tratamiento_id = null;
        $this->dias           = null;
    }




    public function guardarPacienteTratamiento(){
        $this->validate([
            'dias'=>'required'
        ]);


        $paciente_tratamiento = new PacienteTratamiento();
        $paciente_tratamiento->fecha = date('Y-m-d');
        $paciente_tratamiento->dias = $this->dias;
        $paciente_tratamiento->tratamiento_id = $this->tratamiento_id;
        $paciente_tratamiento->paciente_id = $this->paciente_id;
        $paciente_tratamiento->save(); 
        $this->dias;

        $this->paciente_tratamiento = $paciente_tratamiento->id;

        

        $seguimiento = new Seguimiento();
        $seguimiento->etapa = $this->etapa;
        $seguimiento->paciente_tratamiento_id = $paciente_tratamiento->id;
        $seguimiento->save();

        $this->seguimiento_id = $seguimiento->id;

        // date("d-m-Y",strtotime($fecha_actual."+ 1 days"))


        $this->fecha_registro = date('Y-m-d');

        for ($i=0; $i < $this->dias; $i++) { 

            $registro = new Registro();
            $registro->fecha = $this->fecha_registro;
            $this->fecha_registro = date('Y-m-d',strtotime($registro->fecha."+1 days"));
            $registro->save();


            $obje =  new SeguimientoRegistro();
            $obje->seguimiento_id = $seguimiento->id;
            $obje->registro_id = $registro->id;
            $obje->save(); 

            
        }
        
        $this->ocultarFormularioSeguimiento();
        $this->ocultarFormularioTratamiento();
        $this->mostrarListaPacientes();
        
    }
    public function cancelarPacienteTratamiento(){
        $this->resetearTratamiento();
        $this->ocultarFormularioTratamiento();
        $this->mostrarListaPacientes();
    }



    public function mostrarListaSeguimiento(){
        $this->ListaSeguimiento = 1;
    }
    public function ocultarListaSeguimiento(){
        $this->ListaSeguimiento = 0;
    }



    public function mostrarListaTratamientosModal(){
        $this->listaTratamientosModal = 1;
    }

    public function ocultarListaTratamientosModal(){
        $this->listaTratamientosModal = 0 ;
    }


    public function verDetalleTratamientoModal( $tratamiento_id){
        $this->ocultarListaTratamientosModal();
        $this->tratamiento_id = $tratamiento_id;

        $tratamiento  = Tratamiento::findOrFail($tratamiento_id);
        $this->tratamiento = $tratamiento->nombre;


    }

    public function mostrarListaTratamientos(){
        $this->mostrarListaTratamientosModal();
    }


    public function formularioSeguimiento($paciente_id){
        
        // $paciente_tratamiento = PacienteTratamiento::where('paciente_id','=',$paciente_id)->get();
        // $this->paciente_tratamiento = $paciente_tratamiento[0]->id;
        // $seguimiento = Seguimiento::where('paciente_tratamiento_id','=',$this->paciente_tratamiento)->get();
        // $this->seguimiento_id = $seguimiento[0]->id;
        
        $this->mostrarFormularioSeguimiento();
        $this->ocultarListaPacientes();
        $this->ocultarVerSeguimientoPaciente();
        
        $this->mostrarListaSeguimientoPaciente();

        $this->datosPaciente($paciente_id); 
    }

    public function resetearSeguimiento(){
        $this->seguimiento_id = null;
        $this->estado_seguimiento = null;
        $this->evolucion_enfermedad = null; 
        $this->seguiemientos = null;
    }

    public function editarSeguimiento( $seguimiento_registro_id ){
        $this->seguimiento_registro_id = $seguimiento_registro_id;
    }

    public function actualizarSeguimiento(){

        $seguimiento_registro = SeguimientoRegistro::findOrFail($this->seguimiento_registro_id);
        $seguimiento_registro->estado = $this->estado_seguimiento;
        $seguimiento_registro->evolucion_enfermedad = $this->evolucion_enfermedad;
        $seguimiento_registro->update();

        $this->estado_seguimiento = null;
        $this->evolucion_enfermedad = null;


    }

    //Avandona el formulario seguimiento para irse a la lista de pacientes
    public function ocultarSeguimientoMedico(){
        $this->ocultarFormularioSeguimiento();
        $this->mostrarListaPacientes();
        $this->resetearSeguimiento();

        $this->ocultarListaSeguimientoPaciente();
        $this->ocultarActSeguimientoPaciente();
    }

    public function finalizarSeguimiento( $seguimiento_id ){
            $seguimiento =Seguimiento::findOrFail($seguimiento_id);
            $paciente_tratamiento_id = $seguimiento->paciente_tratamiento_id;    

            $paciente_tratamiento = PacienteTratamiento::findOrFail($paciente_tratamiento_id);
            $paciente_id = $paciente_tratamiento->paciente_id; 

            $paciente = Paciente::findOrFail($paciente_id);
            $paciente->caso = $this->estado_paciente;
            $paciente->update();


            $buscarCaso = Caso::where('idPaciente','=',$paciente_id)->get();
            $caso = Caso::findOrFail($buscarCaso[0]->id);
            $caso->estado = $this->estado_paciente;
            $caso->update();   
            $this->ocultarActSeguimientoPaciente();
            $this->mostrarListaSeguimientoPaciente();         
    }



    public function mostrarInformeFormulario(){
        $this->informeFormulario = 1;
    }
    public function ocultarInformeFormulario(){
        $this->informeFormulario = 0;
    }
    public function formularioInformePaciente($paciente_id){
        $this->mostrarInformeFormulario();
        $this->ocultarListaPacientes();
        $this->paciente_id = $paciente_id;
    }


    public function informeSeguimientos(){
        $this->informeSeguimiento = 1;
        $this->informeConsulta    = 0;
        $this->informeTratamiento = 0;
        $this->informeExamen      = 0;
    }
    public function informeTratamientos(){
        $this->informeSeguimiento = 0;
        $this->informeConsulta    = 0;
        $this->informeTratamiento = 1;
        $this->informeExamen      = 0;
    }
    public function informeConsultas(){
        $this->informeSeguimiento = 0;
        $this->informeConsulta    = 1;
        $this->informeTratamiento = 0;
        $this->informeExamen      = 0;
    }
    public function informeExamenes(){
        $this->informeSeguimiento = 0;
        $this->informeConsulta    = 0;
        $this->informeTratamiento = 0;
        $this->informeExamen      = 1;
    }



    
    public function mostrarListaSeguimientoPaciente(){
        $this->listaSeguimientoPaciente = 1;
    }

    public function ocultarListaSeguimientoPaciente(){
        $this->listaSeguimientoPaciente = 0;
    }
    public function mostrarVerSeguimientoPaciente(){
        $this->verSeguimiento = 1;
    }

    public function ocultarVerSeguimientoPaciente(){
        $this->verSeguimiento = 0;
    }

    public function mostrarActSeguimientoPaciente(){
        $this->actSeguimiento = 1;
    }
    public function ocultarActSeguimientoPaciente(){
        $this->actSeguimiento = 0;
    }

    


    public function editarSeguimientoPaciente($paciente_tratamiento_id){
        
        $this->paciente_tratamiento = $paciente_tratamiento_id;
        $seguimiento = Seguimiento::where('paciente_tratamiento_id','=',$paciente_tratamiento_id)->get();
        $this->seguimiento_id = $seguimiento[0]->id;

        $this->ocultarListaSeguimientoPaciente();
        $this->ocultarVerSeguimientoPaciente();
        $this->mostrarActSeguimientoPaciente();

    }

    public function verSeguimientoPaciente($paciente_tratamiento_id){
        $this->paciente_tratamiento = $paciente_tratamiento_id;
        $seguimiento = Seguimiento::where('paciente_tratamiento_id','=',$paciente_tratamiento_id)->get();
        $this->seguimiento_id = $seguimiento[0]->id;

        $this->ocultarListaSeguimientoPaciente();
        $this->mostrarVerSeguimientoPaciente();
        $this->ocultarActSeguimientoPaciente();
    }
}
