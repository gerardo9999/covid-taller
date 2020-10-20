<?php

namespace App\Http\Controllers;

use App\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller{
    
    public function index(){
        return view('sistema\modules\tratamientos\index');
    }
    
    public function destroy($id){
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->delete();

        return redirect('/tratamientos')->with('delete','tratamiento eliminado exitosamente');
    }
    public function create(){
        return view('sistema\modules\tratamientos\create');
    }

    
}

