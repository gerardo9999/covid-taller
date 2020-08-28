<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    
    public function intro(){
        return view('web.modules.intro.index');
    }
    public function covid(){
        return view('web.modules.covid.index');
    }
    public function cuestionario(){
        return view('web.modules.cuestionario.index',['formulario'=>'formulario']);
    }
}
