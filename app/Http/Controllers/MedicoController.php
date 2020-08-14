<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Distrito;
use App\Especialidad;
use App\Hospital;
use App\Medico;
use App\Persona;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{

    public function especialidades(Request $request){
        if($request){
            $query = trim($request->get('searchText'));
            $especialidades = Especialidad::select('id','nombre')->orderBy('id','asc')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(10);
        }

        return view('admin.modules.especialidades.index',['especialidades'=>$especialidades,'searchText'=>$query]);
    }
    public function especialidadStore(Request $request){

        $especialidad = new Especialidad();
        $especialidad->nombre = $request->especialidad;
        $especialidad->save();

        return redirect('/especialidades')->with('create','especialidad guardada exitosamente');
    }
    public function especialidadUpdate(Request $request,$id){
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->nombre = $request->especialidad;
        $especialidad->update();

        return redirect('/especialidades')->with('update','especialidad modificada exitosamente');
    }
    public function especialidadDestroy(Request $request,$id){
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return redirect('/especialidades')->with('delete','especialidad eliminada exitosamente');
    }


    public function medicos(Request $request){

        if($request){
            $query =  trim($request->get('searchText'));
            $medicos = Persona::join('medicos','medicos.id','=','personas.id')
                              ->join('users','users.id','personas.id')
                              ->select('medicos.id','users.id as user_id','personas.id as persona_id','nombre','apellidos','users.avatar')
                              ->where('personas.nombre','LIKE','%'.$query.'%')->paginate(5); 
        }
        return view('admin.modules.medicos.index',[
            'medicos'   => $medicos,
            'searchText'=> $query
        ]);
    }
    public function medicoCreate(){
        
        $especialidades = Especialidad::all();
        $hospitales = Hospital::all();

        return view('admin.modules.medicos.create',[
            'hospitales' => $hospitales,
            'especialidades' => $especialidades
        ]);
        
    }
    
    
    
    public function validateMedicoStore($request){
        
        $reglas = [
            'nombre'            => ['required','string'],
            'apellidos'         => ['required','string'],
            'ci'                => ['required','numeric','unique:personas'],
            'fecha_nacimiento'  => ['required'],
            'nacionalidad'      => ['required'],
            'telefono'          => ['required','numeric'],
            'sexo'              => ['required'],

            'codigo_medico'     => ['required','numeric'],
            'hospital'          => ['required'],
            'especialidad'      => ['required'],



            'departamento_id'   => ['required'],
            'provincia_id'      => ['required'],
            'municipio_id'      => ['required'],
            'distrito'          => ['required','numeric'],
            'numero_domicilio'  => ['required','numeric'],
            'avenida_calle'     => ['required','string'],
            'barrio_zona'       => ['required','string'],


            'name'              => ['required', 'string', 'max:255','unique:users'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8'],
        ];
        
        
        $this->validate($request,$reglas);

    }
    public function medicoStore(Request $request){

        $this->validateMedicoStore($request);

        try{

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
    
    
            $user->assignRole('medico');
    
            $medico = new Medico();
            $medico->id              = $persona->id;
            $medico->codigo_medico   = $request->get('codigo_medico');
            $medico->especialidad_id = $request->get('especialidad');
            $medico->hospital_id     = $request->get('hospital');
            $medico->save();
            DB::commit();

        } catch(\Exception $e){
            DB::rollback();
        }

        return redirect('/medicos')->with('create','se ha guardado correctamente');

    }
    public function medicoEdit(int $id){
        
        $medicos = DB::select("SELECT personas.id,
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
                                      medicos.codigo_medico,
                                      especialidades.nombre as especialidad,
                                      especialidades.id as especialidad_id,
                                      medicos.hospital_id,
                                      hospitales.nombre as hospital,
                                      hospitales.imagen
                               FROM personas,
                                    direcciones,
                                    distritos, 
                                    municipios ,
                                    provincias,
                                    departamentos,
                                    medicos,
                                    users,
                                    especialidades,
                                    hospitales
                               WHERE personas.direccion_id  = direcciones.id AND
                                     distritos.id           = direcciones.distrito_id AND
                                     distritos.municipio_id = municipios.id  AND
                                     municipios.provincia_id = provincias.id AND
                                     departamentos.id = provincias.departamento_id AND

                                     medicos.hospital_id = hospitales.id AND
                                     medicos.id = personas.id AND
                                     medicos.especialidad_id = especialidades.id AND
                                     users.id = personas.id AND
                                     personas.id = $id");

        return view('admin.modules.medicos.update',[
            'medicos' => $medicos
        ]);
    }
    public function medicoUpdate(Request $request, int $id){
        
        $fechaNacimiento = date("Y-m-d",strtotime($request->get('fecha_nacimiento')));

        $persona = Persona::findOrFail($id);
        $persona->nombre            = $request->get('nombre');
        $persona->apellidos         = $request->get('apellidos');
        $persona->ci                = $request->get('ci');
        $persona->telefono          = $request->get('telefono');
        $persona->nacionalidad      = $request->get('nacionalidad');
        $persona->fecha_nacimiento  = $fechaNacimiento;
        $persona->sexo              = $request->get('sexo');
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
        if($request->get('password')){
            $user->password  = Hash::make($request->get('password'));
        }

        if($request->get('sexo')=='hombre'){
            $user->avatar = 'imagenes/avatar-hombre.jpg';
        }else{
            $user->avatar = 'imagenes/avatar-mujer.png';
        }
        $user->save();
        $user->assignRole('medico');

        return redirect('/medicos')->with('create','se ha guardado correctamente');

    }
    public function medicoDestroy(int $id){
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect('/medicos')->with('delete','Se ha eliminado correctamente');
    }

}
