<?php

use App\Consulta;
use App\Departamento;
use App\Especialidad;
use App\Hospital;
use App\Pais;
use App\Persona;
use App\Pregunta;
use App\Provincia;
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

    //Para las consultas de medico
    function consultaMedico($id){
        $consultaMedico = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
        ->join('medicos','medicos.id','=','consultas.medico_id')
        ->select('consultas.estado_consulta',
                 'consultas.motivo_consulta',
                 'consultas.evolucion_enfermedad',
                 'consultas.fecha_consulta',
                 'consultas.fecha_programada'
                )->where('consultas.medico_id','=',$id)
       ->paginate(10);
       
        return $consultaMedico;
    }


?>
