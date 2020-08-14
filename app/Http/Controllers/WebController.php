<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    
    public function intro(){
        return view('web.modules.intro.index');
    }
    

}
