<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index(){
        return view('sistema.modules.examenes.index',[
        ]);
    }
}
