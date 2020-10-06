<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Distrito;
use App\Paciente;
use App\Persona;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PacienteController extends Controller
{
    public function pacientes(){
    //     $user = Auth::user();

    // $rol = $user->roles->implode('name');

    // return $rol;


        return view('sistema.modules.pacientes.index');
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
            if($request->get('numero_seguro')){
                $paciente->numero_seguro = $request->get('numero_seguro'); 
            }else{
                $paciente->numero_seguro = 0;
            }
            $paciente->save();

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
}
