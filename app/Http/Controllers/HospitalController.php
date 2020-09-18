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
    
    public function hospitales(){
        return view('admin.modules.hospitales.index');
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
    public function hospitalShow($id){
        return view('admin.modules.hospitales.show',['id'=> $id]);
    }
}