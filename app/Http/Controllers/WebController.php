<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    
    public function intro(){
        return view('page.modules.intro.index');
    }
    public function covid(){
        return view('page.modules.covid.index');
    }
    public function cuestionario(){
        return view('page.modules.cuestionario.index',['formulario'=>'formulario']);
    }
    public function dashboard(){
        return view('page.modules.dashboard.index');
    }
}
