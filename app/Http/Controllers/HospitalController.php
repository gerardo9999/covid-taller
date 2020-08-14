<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Distrito;
use App\Habitacion;
use App\Hospital;
use App\Planta;
use App\Bloque;
use App\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;

class HospitalController extends Controller
{
    
    /*
    /
    /    Modulo de Hospitales
    */
    public function hospitales(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $hospitales = Hospital::select('id','nombre','telefono','imagen','nivel')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orWhere('nivel','LIKE','%'.$query.'%')
            ->paginate(5);
        }
        return view('admin.modules.hospitales.index',['hospitales'=>$hospitales,'searchText'=>$query]);
    }
    public function validacionHospital($request){
        
        $reglas = [
            'nombre'    => 'required',
            'nivel'     => 'required',
            'imagen'    => 'image|mimes:jpeg,png',
            'telefono'  => 'numeric',

            'departamento_id'  => 'required',
            'provincia_id'     => 'required',
            'municipio_id'     => 'required',

            'distrito'          => 'required|numeric',
            'numero_domicilio'  => 'required|numeric',
            'barrio_zona'       => 'required', 
            'avenida_calle'     => 'required',
        ];
        $this->validate($request,$reglas);

    }
    public function hospitalCreate(){
        return view('admin.modules.hospitales.create');
    }
    public function hospitalStore(Request $request){
        
        $this->validacionHospital($request);
        try{
            DB::beginTransaction();

            $distrito = new Distrito();
            $distrito->nombre =$request->distrito;
            $distrito->municipio_id = $request->municipio_id;
            $distrito->save();


            $direccion = new Direccion();
            $direccion->numero_domicilio    = $request->numero_domicilio;
            $direccion->barrio_zona         = $request->barrio_zona;
            $direccion->avenida_calle       = $request->avenida_calle;
            $direccion->distrito_id         = $distrito->id;
            $direccion->save();


            $hospital = new Hospital();
            $hospital->nombre = $request->nombre;
            $hospital->nivel = $request->nivel;
            $hospital->telefono = $request->telefono;
            $hospital->direccion_id = $direccion->id;

            if($request->file('imagen')){
                $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
                $hospital->imagen = $path;   
            }else{
                $hospital->imagen = 'imagenes/hospital.jpg'; 
            }
            $hospital->save();

            DB::commit();
            
        }catch(\Exception $e){
            DB::rollback();
        }
        return Redirect::to('/hospitales')->with('create','El registro se ha realizado correctamente');
    }
    public function hospitalEdit($id){
        $hospitales = DB::select("SELECT hospitales.id, 
                                            hospitales.nombre ,
                                            hospitales.telefono,
                                            hospitales.nivel, 
                                            distritos.nombre as distrito,
                                            direcciones.avenida_calle, 
                                            direcciones.barrio_zona, 
                                            direcciones.numero_domicilio,
                                            departamentos.nombre as departamento,
                                            provincias.nombre as provincia,
                                            municipios.nombre as municipio,
                                            departamentos.id as departamento_id,
                                            provincias.id as provincia_id,
                                            municipios.id as municipio_id 
                                     FROM hospitales, distritos , direcciones, municipios , provincias , departamentos
                                     WHERE hospitales.direccion_id = direcciones.id
                                     AND distritos.municipio_id = municipios.id
                                     AND provincias.id = municipios.provincia_id
                                     AND direcciones.distrito_id = distritos.id 
                                     AND departamentos.id = provincias.departamento_id
                                     AND hospitales.id = $id 
                                    ");
        return view('admin.modules.hospitales.update',['hospital'=>$hospitales]);
    }
    public function hospitalUpdate(Request $request,$id){

        try{
            
            DB::beginTransaction();

            $hospital = Hospital::findOrFail($id);
            $hospital->nombre = $request->nombre;
            $hospital->nivel = $request->nivel;
            $hospital->telefono = $request->telefono;
            if($request->file('imagen')){
                $path = Storage::disk('public')->put('imagenes',$request->file('imagen'));
                $hospital->imagen = $path;   
            }
            $hospital->update();

            $direccion = Direccion::findOrFail($hospital->direccion_id);
            $direccion->numero_domicilio = $request->numero_domicilio;
            $direccion->barrio_zona = $request->barrio_zona;
            $direccion->avenida_calle = $request->avenida_calle;
            $direccion->update();

            $distrito = Distrito::findOrFail($direccion->distrito_id);
            $distrito->nombre =$request->distrito;
            $distrito->update();

            DB::commit();
            
        }catch(\Exception $e){
            DB::rollback();
        }
        return Redirect::to('/hospitales')->with('update','El registro se ha actualizado correctamente');
    }
    public function hospitalDestroy($id){

        $hospital = Hospital::findOrFail($id);
        $hospital->delete();
        return Redirect::to('/hospitales')->with('delete','El registro se ha elimindado correctamente');
    }


    /*
    /
    /    Modulo de Plantas
    */    
    public function plantas(int $id){
        $hospital = Hospital::where('id','=',$id)->get();


        $plantas = Planta::join('hospitales','hospitales.id','=','plantas.hospital_id')
                            ->select('plantas.nombre','plantas.id','plantas.hospital_id')->where('plantas.hospital_id','=',$id)
                            ->paginate(10);


        return view('admin.modules.plantas.index',[
            'hospital'=>$hospital,
            'plantas' => $plantas
        ]);
    }
    public function plantaStore(Request $request){
        
        $planta = new Planta();
        $planta->nombre = $request->get('planta');
        $planta->hospital_id = $request->get('hospital_id');
        $planta->save();

        return redirect('/hospitales/plantas/'.$request->get('hospital_id'))->with('create','se ha agregado correctamente');
    }
    public function plantaUpdate(Request $request,$id){
        
        $planta =Planta::findOrFail($id);
        $planta->nombre = $request->get('planta');
        $planta->hospital_id = $request->get('hospital_id');
        $planta->update();

        return redirect('/hospitales/plantas/'.$request->get('hospital_id'))->with('create','se ha agregado correctamente');   
    }
    public function plantaDestroy(Request $request,$id){
        $planta =Planta::findOrFail($id);
        $planta->delete();

        return redirect('/hospitales/plantas/'.$request->get('hospital_id'))->with('create','se ha agregado correctamente');   
    }

    /*
    /
    /    Modulo de bloques
    */ 

    public function bloques(int $id){
        
        $hospital = Hospital::join('plantas','plantas.hospital_id','=','hospitales.id')
        ->select('hospitales.id',
                'plantas.nombre as planta',
                'plantas.id as planta_id',
                'hospitales.nombre',
                'hospitales.imagen')->where('plantas.id','=',$id)->get();

        $bloques = Planta::join('bloques','bloques.planta_id','=','plantas.id')
                            ->select('bloques.nombre','bloques.id')->where('plantas.id','=',$id)
                            ->paginate(10);

        $plantas = Planta::join('hospitales','hospitales.id','=','plantas.hospital_id')
                            ->select('plantas.nombre','plantas.id','plantas.hospital_id')->where('plantas.id','=',$id)
                            ->paginate(10);

        return view('admin.modules.bloques.index',[
            'hospital' => $hospital,
            'bloques' => $bloques,
            'plantas'=>$plantas
        ]);
    }
    public function bloqueStore(Request $request){
        
        $bloque = new Bloque();
        $bloque->nombre = $request->get('bloque');
        $bloque->planta_id = $request->get('planta_id');
        $bloque->save();

        return redirect('hospitales/bloques/'.$request->get('planta_id'))->with('create','se ha agregado correctamente');
    }



    /*
    /
    /    Modulo de TipoHabitaciones
    */ 
    public function tipoHabitaciones(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $tipoHabitaciones = TipoHabitacion::select('nombre','id')->where('nombre','LIKE','%'.$query.'%')->paginate(5);

        }

        return view('admin.modules.tipohabitaciones.index',[
            'tipoHabitaciones' => $tipoHabitaciones,
            'searchText' => $query
        ]);
    }
    public function tipoHabitacionesStore(Request $request){
        $tipoHabitacion = new TipoHabitacion();
        $tipoHabitacion->nombre = $request->get('nombre'); 
        $tipoHabitacion->save();

        return redirect('/tipoHabitaciones')->with('create','se ha creado el registro exitosamente');
    }
    public function tipoHabitacionesUpdate(Request $request,$id){
        $tipoHabitacion = TipoHabitacion::findOrFail($id);
        $tipoHabitacion->nombre = $request->get('nombre');
        $tipoHabitacion->update();

        return redirect('/tipoHabitaciones')->with('create','se ha modificado el registro exitosamente');
    }
    public function tipoHabitacionesDestroy($id){
        $tipoHabitacion = TipoHabitacion::findOrFail($id);
        $tipoHabitacion->delete();

        return redirect('/tipoHabitaciones')->with('delete','se ha eliminado el registro exitosamente');
    }


    /*
    /
    /    Modulo de TipoHabitaciones
    */ 
    //recibimos el id de la bloque
    public function habitaciones(int $id){

        $habitaciones        = Habitacion::all();
        $tipoHabitaciones   = TipoHabitacion::all();

        $bloque   = Bloque::where('bloques.id','=',$id)->get();
        $planta = Bloque::join('plantas','plantas.id','=','bloques.planta_id')
                          ->select('plantas.nombre as planta','plantas.id as planta_id','plantas.hospital_id')
                          ->where('bloques.id','=',$id)
                          ->get();
        

        $hospital = Hospital::all()->where('id','=',$planta[0]->hospital_id);

        return view('admin.modules.habitaciones.index',[
            'bloque' => $bloque,
            'hospital'=> $hospital,
            'planta'=>$planta,
            'habitaciones' => $habitaciones,
            'tipoHabitaciones'=> $tipoHabitaciones
        ]);

    }

    public function habitacionStore(Request $request){
        
        $habitacion = new Habitacion();
        $habitacion->nombre = $request->get('habitacion');
        $habitacion->bloque_id = $request->get('bloque_id');
        $habitacion->tipoHabitacion_id = $request->get('tipoHabitacion_id');

        $ruta ='';

        if($request->get('guardar')=='guardar_ver'){
            $ruta = '/hospitales';
        }else{
            $ruta ='/hospitales/habitaciones/'.$request->get('bloque_id');
        }
        return redirect($ruta)->with('create','se ha guardado correctamente');
    }

}









