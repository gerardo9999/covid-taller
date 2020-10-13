<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function reporteDiario(){
        return view('sistema\modules\reportes\diario\index');
    }

    public function reporteMensual(){
        return view('sistema\modules\reportes\mensual\index');
    }
}
