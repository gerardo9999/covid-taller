<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolController extends Controller
{
    public function index(){
        
        
        return view(
            'sistema.modules.rol.index'
        );
    }
}
