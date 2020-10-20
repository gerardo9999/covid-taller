<?php

use App\Caso;
use App\Consulta;
use App\Departamento;
use App\Tratamiento;
use App\Diagnostico;
use App\Especialidad;
use App\Hospital;
use App\Examen;
use App\Paciente;
use App\HistorialMedico;
use App\Medicamento;
use App\MedicamentoTratamiento;
use App\Medico;
use App\Municipio;
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


    function historiales($id){
        $historial = HistorialMedico::join('pacientes','pacientes.id','=','historiales_medicos.paciente_id')
        ->where('pacientes.id','=',$id)->get();

        return $historial;
    }

    function examenes($id){
        $historial = Paciente::join('consultas','consultas.paciente_id','=','pacientes.id')
        ->join('medicos','medicos.id','=','consultas.medico_id')
        ->join('examenes','examenes.consulta_id','=','consultas.id')
        ->join('tipo_examen','tipo_examen.id','=','examenes.tipo_id')
        ->select('pacientes.id as paciente_id','pacientes.numero_seguro','consultas.id as consulta_id',
                 'consultas.fecha_registrada','consultas.fecha_programada','examenes.fecha_realizado as fecha_examen','examenes.fecha_resultado',
                 'examenes.resultado','tipo_examen.nombre as examen'
        )
        ->where('pacientes.id','=',$id)->get();

        return $historial;
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
        ->select('consultas.id as consulta_id','diagnosticos.descripcion',
        'diagnosticos.id')
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
        ->select('examenes.id as examen_id','tipo_examen.nombre as tipo_examen','examenes.fecha_realizado','examenes.descripcion')
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
    //Cuenta cuantos hay actualmente en una provincia
    function countCasosActualesProvincias($id,$caso){
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
        $count = count($query);
        return $count;
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


    function covidActuales($estado){
        $fecha = date('Y-m-d');
        
        if($estado == 'confirmados'){
            $infectados = Caso::where('estado','=',$estado)->where('casos.fecha','=',$fecha)->get();
        }
        if($estado == 'sospechosos'){
            $infectados = Caso::where('estado','=',$estado)->where('casos.fecha','=',$fecha)->get();
        }
        if($estado == 'recuperados'){
            $infectados = Caso::where('estado','=',$estado)->where('casos.fecha','=',$fecha)->get();
        }
        if($estado == 'desesos'){
            $infectados = Caso::where('estado','=',$estado)->where('casos.fecha','=',$fecha)->get();
        }
        if($estado == 'descartados'){
            $infectados = Caso::where('estado','=',$estado)->where('casos.fecha','=',$fecha)->get();
        }
        if($estado == 'descartados'){
            $infectados = Caso::where('estado','=',$estado)->where('casos.fecha','=',$fecha)->get();
        }

        return count($infectados);
    }


    function misConsutas(){
        $id =  Auth::id();

        $paciente = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
            ->join('medicos','medicos.id','=','consultas.medico_id')
            ->where('medicos.id','=',$id)
            ->distinct()->paginate(10);

        return $paciente;
    }   

    function nombreCompletoPaciente($paciente_id){
        $nombre = Persona::select(
            'nombre',
            'apellidos',
            'ci',
            'telefono',
            'nacionalidad',
            'fecha_nacimiento',
            'sexo'
        )
        ->where('personas.id','=',$paciente_id)
        ->get();

        return $nombre;
    }




    function existeConsulta($paciente_id){
        $sw = false;
        $consulta = Consulta::where('paciente_id','=',$paciente_id)->get();
        $existe = count($consulta);

        if ($existe) {
            $sw = true;
        }
        return $sw;
    }

    //trae la especialidad de un medico
    function especialidad($medico_id){
        $medico = Medico::findOrFail($medico_id);
        $especialidad = Especialidad::findOrFail($medico->especialidad_id);

        return $especialidad;
    }

    //trae el hospital de un medico
    function hospital($medico_id){
        $medico = Medico::findOrFail($medico_id);
        $hospital = Hospital::findOrFail($medico->hospital_id);
        return $hospital;
    }
    function usuario($persona_id){
        $usuario = User::findOrFail($persona_id);
        return $usuario;
    }


    function consulta($consulta_id){
        $consulta = Consulta::findOrFail($consulta_id);
        return $consulta;
    }









    function dataProvincia(){
        $provincias = Provincia::all();
        $arrayProvincia=[];
        foreach ($provincias as $key => $provincia) {
            array_push($arrayProvincia,$provincia->nombre);
        }

        return $arrayProvincia;
    }
    function dataMunicipio(){
        $municipios = Municipio::all();
        $arrayMunicipio=[];
        foreach ($municipios as $key => $municipio) {
            array_push($arrayMunicipio,$municipio->nombre);

        }
        return $arrayMunicipio;
    }
    
    function countCasosActualesMunicipio($caso,$id){
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
                ->where('municipios.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        $count = count($query);
        return $count;
    }





    // medicamentos
    function medicamentos(){
        return Medicamento::all();
    }






    function detalleTratamiento($tratamiento_id){
        $detalle = MedicamentoTratamiento::join('tratamientos',
                                                'tratamientos.id','=','medicamento_tratamiento.tratamiento_id')
                                           ->join('medicamentos',
                                                'medicamentos.id','=','medicamento_tratamiento.medicamento_id')
                                           ->select('medicamento_tratamiento.indicaciones as indicacion',
                                                    'medicamento_tratamiento.cantidad',
                                                    'medicamentos.nombre as medicamento'
                                            )->where('medicamento_tratamiento.tratamiento_id','=',$tratamiento_id)->get();
                                        

        return $detalle;

    }

    function tratamientos(){
        $tratamiento = Tratamiento::all();
        return $tratamiento;
    }
    
?>
