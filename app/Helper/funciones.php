<?php

use App\Caso;
use App\Consulta;
use App\Departamento;
use App\Diagnostico;
use App\Especialidad;
use App\Hospital;
use App\Examen;
use App\Paciente;
use App\HistorialMedico;
use App\Pais;
use App\PDF;
use App\Persona;
use App\Pregunta;
use App\Prescripcion;
use App\Provincia;
use App\TipoExamen;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

/*  Tabla user auth*/ 
    function userIdAuth(){
        $user = Auth::user();
        return $user->id;
    }
    function userNameAuth(){
        $user = Auth::user();
        return $user->name;
    }
    function userEmailAuth(){
        $user = Auth::user();
        return $user->email;
    }

    function userAvatarAuth(){
        $user = Auth::user();
        return $user->avatar;
    }

    /*  Tabla user guest*/ 
    function userNameGuest($id){
        $user = User::select('id')->get();
        return $user->name;
    }
    function userEmailGuest($id){
        $user = User::select('email')->get();
        return $user->name;
    }
    function userAtavarGuest($id){
        $user = User::select('avatar')->get();
        return $user->name;
    }
    function userCreateGuest($id){
        $user = User::select('id')->get();
        return $user->name;
    }



    













function usuarioRol(){
    $user = Auth::user();
    $rol = $user->roles->implode('name');
    return $rol;
}







function isRoute($path){
    return  request()->is($path);
}



//Messages recividos excepto los que envio el usuario autenticado


// Mensajes enviados del usuario autenticado ..  para las actividades del usuario administrador
















//Especialidades de los medicos
 





//Hospiatales

function existHospitales(){
    $hospitales = Hospital::all();
    $condicion = false;
    if (isset($hospitales)){
        $condicion = true;
    }
    return $condicion;
}









// avatar del usuario autenticado 
function avatarUsuario(){
    $user = Auth::user();
    return $user->avatar;
}

function getUsuario($id){

    $persona = Persona::where('personas.id','=',$id)->get();
    return $persona;
}

//avatar de cualquier usuario
function avatar($id){
    $avatar =  User::select('id','avatar')->where('id','=',$id)->get();
    return $avatar;
}



    





function preguntas(){
    $preguntas = Pregunta::all();
    return $preguntas;
}
function getPregunta($id){
    $preguntas = Pregunta::where('preguntas.id','=',$id)->get();
    return $preguntas[0]->pregunta;
}



    /* Todas las tablas*/
    function paises(){
        $paises = Pais::all();
        return $paises;
    }
    function hospitales(){
        $hospitales = Hospital::all();
        return $hospitales;
    } 
    function especialidades(){
        $especialidades = Especialidad::all();
        return $especialidades;
    }
    function roles(){
        $roles = Role::all();
        return $roles;
    }

    // Trae los departamentos de la base de datos
    function departamentos(){
        $departamentos = Departamento::all();
        return $departamentos;
    }

    function provincias(){
        $provincias = Provincia::all();
        return $provincias;
    }

    // Trae las provincias de un departamento
    function buscar_provincias($departamento_id){
        $provincias =DB::select("SELECT *FROM provincias WHERE departamento_id = $departamento_id");
        return $provincias;
    }

    //Trae los municipios de una provincia
    function buscar_municipio($provincia_id){
        $municipios =DB::select("SELECT *FROM municipios WHERE provincia_id = $provincia_id");
        return $municipios;
    }

    

    //Datos de un paciente
    function paciente($id){

        $paciente = Paciente::join('personas','personas.id','pacientes.id')->join('users','users.id','=','personas.id')
        ->where('pacientes.id','=',$id)->get();
        return $paciente;
    }

    function direccionPaciente($id){
        $direccion = DB::select("SELECT  
        departamentos.nombre as departamento,
        provincias.nombre as provincia,
        municipios.nombre as municipio,
        distritos.nombre as distrito,
        direcciones.avenida_calle,
        direcciones.barrio_zona,
        direcciones.numero_domicilio
        FROM departamentos,provincias,municipios,distritos,direcciones ,personas 
        WHERE departamentos.id = provincias.departamento_id AND
        provincias.id = municipios.provincia_id AND 
        municipios.id = distritos.municipio_id AND
        distritos.id = direcciones.distrito_id AND
        direcciones.id = personas.direccion_id AND
        personas.id = $id
        ");

        return $direccion;
    }



    //historial de pacientes
     function historial(){
        $historial = HistorialMedico::all();
        return $historial;
    }





    function examenes(){
        $examen = Examen::all();
        return $examen;
    }
    function consultas(){
        $consultas = Consulta::all();
        return $consultas;
    }

    function prueba($id){

        $examenes = DB::select("SELECT resultado , pacientes.numero_seguro,consultas.fecha_registrada
        FROM examenes, consultas , pacientes 
        WHERE examenes.consulta_id = consultas.id 
        AND pacientes.id = consultas.paciente_id 
        AND pacientes.id = $id");

        return $examenes;
    }


    function casos($estado){

        if($estado =='confirmados'){
            $infectados = Caso::where('estado','=',$estado)->get();
        }
        if($estado =='sospechosos'){
            $infectados = Caso::where('estado','=',$estado)->get();

        }
        if($estado =='recuperados'){
            $infectados = Caso::where('estado','=',$estado)->get();

        }
        if($estado =='desesos'){
            $infectados = Caso::where('estado','=',$estado)->get();

        }
        if($estado =='descartados'){
            $infectados = Caso::where('estado','=',$estado)->get();

        }
        if($estado =='descartados'){
            $infectados = Caso::where('estado','=',$estado)->get();
        }

        return count($infectados);
    }


    function confirmados(){
        $confirmado = Caso::where('estado','=','confirmados')->get();
        return count($confirmado);
    }

    function consultasMedico($id){
        
        $consultasMedico = DB::select("SELECT consultas.id,consultas.fecha_registrada FROM consultas,medicos,pacientes 
        WHERE consultas.medico_id = medicos.id 
        AND consultas.paciente_id =  pacientes.id
        AND medicos.id = $id");

        return $consultasMedico;
    }

    function consultasPaciente($id){
         
        $consultasPaciente = DB::select("SELECT consultas.id,
                                                consultas.motivo_consulta,
                                                consultas.fecha_registrada,
                                                consultas.fecha_programada,
                                                consultas.hora_programada,
                                                consultas.estado_consulta
                                                FROM consultas,medicos,pacientes 
                                                WHERE consultas.medico_id = medicos.id 
                                                AND consultas.paciente_id =  pacientes.id
                                                AND pacientes.id = $id");

        return $consultasPaciente;
    }

    function informacionConsulta($consulta){
        
        $informacionConsulta = DB::select("SELECT consultas.id,
                consultas.motivo_consulta,
                consultas.fecha_registrada,
                consultas.fecha_programada,
                consultas.hora_programada,
                consultas.estado_consulta
                FROM consultas,medicos,pacientes 
                WHERE consultas.medico_id = medicos.id 
                AND consultas.paciente_id =  pacientes.id
                AND consultas.id = $consulta");

        return $informacionConsulta;
    }
    
    function existeDiagnostico($consulta){
        $sw = false;

        $diagnostico = Diagnostico::join('consultas','consultas.id','=','diagnosticos.consulta_id')
        ->where('diagnosticos.consulta_id','=',$consulta)
        ->get();
        $count = count($diagnostico);

        if($count){
            $sw = true;
        }
        return $sw;
    }

    function existePrescripcion($consulta){
        $sw = false;

        $diagnostico = Prescripcion::join('consultas','consultas.id','=','prescripciones.consulta_id')
        ->where('prescripciones.consulta_id','=',$consulta)
        ->get();
        $count = count($diagnostico);

        if($count){
            $sw = true;
        }
        return $sw;
    }

    function existeExamenMedico($consulta){    
        $sw = false;

        $examen = Examen::join('consultas','consultas.id','=','examenes.consulta_id')
        ->where('examenes.consulta_id','=',$consulta)
        ->get();
        $count = count($examen);

        if($count){
            $sw = true;
        }
        return $sw;
    }

    function diagnosticoConsulta($consulta){
        
        $diagnostico = Diagnostico::join('consultas','consultas.id','=','diagnosticos.consulta_id')
        ->select('consultas.id as consulta_id','diagnosticos.descripcion','diagnosticos.evolucion_enfermedad','diagnosticos.id')
        ->where('diagnosticos.consulta_id','=',$consulta)
        ->get();

        return $diagnostico;
    }
    function prescripcionConsulta($consulta){
        $prescripcion = Prescripcion::join('consultas','consultas.id','=','prescripciones.consulta_id')
        ->select('consultas.id as consulta_id','prescripciones.indicaciones','prescripciones.medicamento','prescripciones.cantidad_producto','prescripciones.id')
        ->where('prescripciones.consulta_id','=',$consulta)
        ->get();

        return $prescripcion;
    }
    function examenMedico($consulta){
        $examenes = Examen::join('tipo_examen','tipo_examen.id','=','examenes.tipo_id')
        ->join('consultas','consultas.id','=','examenes.consulta_id')
        ->select('tipo_examen.nombre as tipo_examen','examenes.fecha_realizado','examenes.descripcion')
        ->where('examenes.consulta_id','=',$consulta)
        ->get();
        return $examenes;
    }
    function tipo_examen(){
        $tipo = TipoExamen::all();
        return $tipo;
    }
    //historial medico de un determinado paciente
    function historialMedico($paciente_id){
        $historial = HistorialMedico::join('pacientes','pacientes.id','=','historiales_medicos.paciente_id')
        ->where('pacientes.id','=',$paciente_id)
        ->get();
        return $historial;
    } 
    function nombreExamen($id){
        $tipo = TipoExamen::select('nombre')->where('id','=',$id)->get();
        return $tipo[0]->nombre;
    }



    //total casos provinciales
    function totalCasos($id,$caso){
        $total = PDF::provinciaCasos($id,$caso);
        $count = count($total);
        return $count;
    }

    // casos actuales provinciales
    function casosActuales($id,$caso){
        
        $fecha = date('Y-m-d');
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
                ->join('personas','personas.id','=','pacientes.id')
                ->join('direcciones','direcciones.id','=','personas.direccion_id')
                ->join('distritos','distritos.id','=','direcciones.distrito_id')
                ->join('municipios','municipios.id','=','distritos.municipio_id')
                ->join('provincias','provincias.id','=','municipios.provincia_id')
                ->select( 'casos.estado',
                        'casos.fecha',
                        'personas.nombre',
                        'personas.apellidos',
                        'direcciones.avenida_calle',
                        'distritos.nombre as distrito',
                        'municipios.nombre as municipio',
                        'provincias.nombre as provincia'
                        )
                ->where('provincias.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        
        return $query;
    }

    function totalCasosActuales($data){
        $total = count($data);
        return $total;
    }



    function nombrePaciente($consulta){
        $consulta = Consulta::findOrFail($consulta);

        $paciente_id = $consulta->paciente_id;
        $paciente =  Persona::findOrFail($paciente_id);
        $nombre = $paciente->nombre;
        $apellidos = $paciente->apellidos;
        $nombreCompleto = $nombre .' '.$apellidos;
        return $nombreCompleto;
    }
?>
