<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Provincia;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    
    public function provincias(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $provincias = Provincia::select('id','nombre')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(10);
        }
        return view('admin.modules.provincias.index',['provincias'=> $provincias,'searchText'=>$query]);
    }
    public function provinciaStore(Request $request){

        $provincia = new Provincia();
        $provincia->nombre = $request->provincia;
        $provincia->departamento_id = 1;
        $provincia->save();

        return redirect('/provincias')->with('create','provincia guardar exitosamente');
    }
    public function provinciaUpdate(Request $request,$id){

        $provincia = Provincia::findOrFail($id);
        $provincia->nombre = $request->provincia;
        $provincia->departamento_id = 1;
        $provincia->update();

        return redirect('/provincias')->with('update','provincia actualizada exitosamente');
    }
    public function provinciaDesctroy($id){

        $provincia = Provincia::findOrFail($id);
        $provincia->delete();

        return redirect('/provincias')->with('delete','provincia eliminada exitosamente');
    }



    public function municipios(Request $request){
        
        if($request){
            $query = trim($request->get('searchText'));
            $municipios = Municipio::join('provincias','provincias.id','=','municipios.provincia_id')
            ->select('municipios.id', 'municipios.provincia_id',
                     'provincias.nombre as provincia',
                     'municipios.nombre as municipio')->orderBy('municipios.id','desc')
                     ->where('municipios.nombre','LIKE','%'.$query.'%')
                     ->orWhere('provincias.nombre','LIKE','%'.$query.'%')
                ->paginate(10);
                $provincias = Provincia::all();
        }

        return view('admin.modules.municipios.index',['municipios'=> $municipios,'provincias'=>$provincias,'searchText'=>$query]);
    }
    public function municipioStore(Request $request){

        $municipio = new Municipio();
        $municipio->nombre = $request->municipio;
        $municipio->provincia_id = 1;
        $municipio->save();

        return redirect('/municipios')->with('create','municipio guardado exitosamente');
    }
    public function municipioUpdate(Request $request,$id){

        $municipio = Municipio::findOrFail($id);
        $municipio->nombre = $request->municipio;
        $municipio->departamento_id = 1;
        $municipio->update();

        return redirect('/municipios')->with('update','municipio actualizado exitosamente');
    }
    public function municipioDestroy($id){

        $municipio = Municipio::findOrFail($id);
        $municipio->delete();

        return redirect('/municipios')->with('delete','municipio eliminado exitosamente');
    }
}
