<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Consulta;
use App\Direccion;
use App\Distrito;
use App\Hospital;
use App\Medico;
use App\Paciente;
use App\Persona;
use App\Ubicacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PacienteController extends Controller{
    
    
    public function pacientes(){
        //     $user = Auth::user();

        // $rol = $user->roles->implode('name');

        // return $rol;
        return view('sistema.modules.pacientes.index');
    }
    public function pacientesMedico(){
        return view('sistema.modules.pacientes.misPacientes');
    }
    public function pacienteCreate(){
        return view('sistema.modules.pacientes.create');
    }
    public function pacienteStore(Request $request){
        
        try {
            DB::beginTransaction();

            $fechaNacimiento = date("Y-m-d",strtotime($request->get('fecha_nacimiento')));
            $distrito = new Distrito();
            $distrito->nombre = $request->get('distrito');
            $distrito->municipio_id = $request->get('municipio_id');
            $distrito->save();
            
            $direccion = new Direccion();
            $direccion->avenida_calle    = $request->get('avenida_calle');
            $direccion->numero_domicilio = $request->get('numero_domicilio');
            $direccion->barrio_zona      = $request->get('barrio_zona');
            $direccion->distrito_id      = $distrito->id;
            $direccion->save();
    
            $persona = new Persona();
            $persona->nombre            = $request->get('nombre');
            $persona->apellidos         = $request->get('apellidos');
            $persona->ci                = $request->get('ci');
            $persona->telefono          = $request->get('telefono');
            $persona->nacionalidad      = $request->get('nacionalidad');
            $persona->fecha_nacimiento  = $fechaNacimiento;
            $persona->sexo              = $request->get('sexo');
            $persona->direccion_id      = $direccion->id;
            $persona->save();
                        
            $user = new User();
            $user->id        = $persona->id;
            $user->name =  $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            if($request->get('sexo')=='hombre'){
                $user->avatar = 'imagenes/avatar-hombre.jpg';
            }else{
                $user->avatar = 'imagenes/avatar-mujer.png';
            }
            $user->save();
    
    
            $user->assignRole('paciente');

            $paciente = new Paciente();
            $paciente->id = $user->id;
            $paciente->internado = 0;
            $paciente->caso = "sospechosos";
            if($request->get('numero_seguro')){
                $paciente->numero_seguro = $request->get('numero_seguro'); 
            }else{
                $paciente->numero_seguro = 0;
            }
            $paciente->save();

            $caso = new Caso();
            $caso->estado = 'sospechosos';
            $caso->paciente_id = $paciente->id;
            $caso->fecha = date('Y-m-d');
            $caso->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        return redirect('/pacientes')->with('create','El paciente fue registrado exitosamente');
    }
    public function pacienteEdit(int $id){
        
        $paciente = DB::select("SELECT personas.id,
                                      personas.nombre, 
                                      personas.apellidos,
                                      personas.ci,
                                      personas.fecha_nacimiento,
                                      personas.telefono,
                                      personas.nacionalidad,
                                      personas.sexo,
                                      personas.direccion_id,
                                      direcciones.numero_domicilio,
                                      direcciones.avenida_calle,
                                      direcciones.barrio_zona,
                                      direcciones.distrito_id,
                                      distritos.nombre as distrito,
                                      municipios.id as municipio_id,
                                      provincias.id as provincia_id,
                                      departamentos.id as departamento_id,
                                      users.name,
                                      users.email,
                                      pacientes.numero_seguro
                               FROM personas,
                                    direcciones,
                                    distritos, 
                                    municipios ,
                                    provincias,
                                    departamentos,
                                    pacientes,
                                    users
                               WHERE personas.direccion_id  = direcciones.id AND
                                     distritos.id           = direcciones.distrito_id AND
                                     distritos.municipio_id = municipios.id  AND
                                     municipios.provincia_id = provincias.id AND
                                     departamentos.id = provincias.departamento_id AND

                                     pacientes.id = personas.id AND
                                     users.id = personas.id AND
                                     personas.id = $id");

        return view('sistema.modules.pacientes.update',[
            'paciente' => $paciente
        ]);
    }
    public function pacienteUpdate(Request $request, int $id){
        
        
        try {
            DB::beginTransaction();
            $persona = Persona::findOrFail($id);
            $persona->nombre            = $request->get('nombre');
            $persona->apellidos         = $request->get('apellidos');
            $persona->ci                = $request->get('ci');
            $persona->telefono          = $request->get('telefono');
            if($request->get('nacionalidad')){
                $persona->nacionalidad      = $request->get('nacionalidad');
            }
            iF($request->get('fecha_nacimiento')){
                $fechaNacimiento = date("Y-m-d",strtotime($request->get('fecha_nacimiento')));
                $persona->fecha_nacimiento  = $fechaNacimiento;
            }
            if($request->get('sexo')){
                $persona->sexo              = $request->get('sexo');
            }

            $persona->update();


            $direccion = Direccion::findOrFail($persona->direccion_id);
            $direccion->avenida_calle    = $request->get('avenida_calle');
            $direccion->numero_domicilio = $request->get('numero_domicilio');
            $direccion->barrio_zona      = $request->get('barrio_zona');
            $direccion->update();


            $distrito = Distrito::findOrFail($direccion->distrito_id);
            $distrito->nombre = $request->get('distrito');
            $distrito->municipio_id = $request->get('municipio_id');
            $distrito->update();
                        
            $user = User::findOrFail($persona->id);
            $user->id        = $persona->id;
            $user->name      =  $request->get('name');
            $user->email     = $request->get('email');
            $user->password  = Hash::make($request->get('password'));
            if($request->get('sexo')=='hombre'){
                $user->avatar = 'imagenes/avatar-hombre.jpg';
            }else{
                $user->avatar = 'imagenes/avatar-mujer.png';
            }
            $user->save();
            $user->assignRole('paciente');

            DB::commit();    
        } catch (\Throwable $th) {
            DB::rollback();
        }
        return redirect('/pacientes')->with('create','se ha modificado correctamente');

    }
    public function pacienteDestroy(int $id){
        $medico = Paciente::findOrFail($id);
        $medico->delete();

        return redirect('/pacientes')->with('delete','Se paciente ha eliminado correctamente');
    }

    public function storePaciente(Request $request){
        // try {
        //     DB::beginTransaction();

            $fechaNacimiento = date("Y-m-d",strtotime($request->get('fecha_nacimiento')));
            
            $distrito = new Distrito();
            $distrito->nombre = $request->get('distrito');
            $distrito->municipio_id = $request->get('municipio_id');
            $distrito->save();
            
            $direccion = new Direccion();
            $direccion->avenida_calle    = $request->get('avenida_calle');
            $direccion->numero_domicilio = $request->get('numero_domicilio');
            $direccion->barrio_zona      = $request->get('barrio_zona');
            $direccion->distrito_id      = $distrito->id;
            $direccion->save();
    

            $persona = new Persona();
            $persona->nombre            = $request->get('nombre');
            $persona->apellidos         = $request->get('apellidos');
            $persona->ci                = $request->get('ci');
            $persona->telefono          = $request->get('telefono');
            $persona->nacionalidad      = $request->get('nacionalidad');
            $persona->fecha_nacimiento  = $fechaNacimiento;
            $persona->sexo              = $request->get('sexo');
            $persona->direccion_id      = $direccion->id;
            $persona->save();

            

                        
            // $user = new User();
            // $user->id        = $persona->id;
            // $user->name =  $request->get('name');
            // $user->email = $request->get('email');
            // $user->password = Hash::make($request->get('password'));
            // if($request->get('sexo')=='hombre'){
            //     $user->avatar = 'imagenes/avatar-hombre.jpg';
            // }else{
            //     $user->avatar = 'imagenes/avatar-mujer.png';
            // }
            // $user->save();
    
    
            // $user->assignRole('invitado');

            

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        // }
        return view('page.modules.cuestionario.resultado',['persona'=>$persona]);
    }

    public function redirecionar(){
        return redirect('some/url')->compact('');
    }
    //vistas del paciente
    public function miMedico(){

        $usuario = Auth::id();
        $medico = Consulta::join('medicos','medicos.id','=','consultas.medico_id')
                            ->join('pacientes','pacientes.id','=','consultas.paciente_id')
                            ->join('personas','personas.id','=','medicos.id')
                            ->where('pacientes.id','=',$usuario)
                            ->select('medicos.id as medico_id','personas.nombre','personas.apellidos','personas.telefono')
                            ->distinct()
                            ->get();



        $data = [
            "medico"=>$medico
        ];
        return view('sistema.modules.mi-informacion.medico',$data);
    }
    public function misConsultas(){
        return view('sistema.modules.mi-informacion.consulta');
    }
    public function misExamenes(){


        return view('sistema.modules.mi-informacion.examen');
    }
    public function misPrescripciones(){
       
        
        return view('sistema.modules.mi-informacion.prescripcion');
    } 

    public function PacienteTratamiento($paciente_id){
        $paciente = Paciente::findOrFail($paciente_id);
        $personaPaciente = Persona::findOrFail($paciente_id);

        return view('sistema.modules.pacientes.tratamiento',[
            "paciente" => $paciente,
            "personaPaciente" => $personaPaciente
        ]);
    }
    public function miInforme(){
        return view('sistema.modules.pacientes.miInforme');
    }

}
