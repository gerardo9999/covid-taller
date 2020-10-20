<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller{
    
    public function index(){
        return view('sistema\modules\medicamentos\index');
    }
    public function store(Request $request){
        
        $medicamento = new Medicamento();
        $medicamento->nombre = $request->medicamento;
        $medicamento->save();

        return redirect('/medicamentos')->with('create','medicamento guardado exitosamente');
    }
    public function update(Request $request,$id){
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->nombre = $request->medicamento;
        $medicamento->update();

        return redirect('/medicamentos')->with('update','medicamento actualizado exitosamente');
    }

    public function destroy($id){
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete();

        return redirect('/medicamentos')->with('delete','medicamento eliminado exitosamente');
    }
}
