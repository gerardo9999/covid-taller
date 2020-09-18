<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionController extends Controller
{
    public function arrayHospitales(){
        return [
            ["hospital"=>"Eldy"],
            "Ana",
            "Daniel"
         
        ];
    }
   
    public function arrayCalles(){
            
        return [
            ['avenida_calle'=>'C/Mexico'],
        ];
    }
    public function arrayBarrios(){
            
        return [
            [ 'barrio_zona'=>'1er Anillo'],
        ];
    }

    //1 -101
    public function arrayDistrito(){
            
        return [
            [ 'distrito_id'=>1],
            [ 'distrito_id'=>2],
            [ 'distrito_id'=>3],


            [ 'distrito_id'=>1],
            [ 'distrito_id'=>1],
            [ 'distrito_id'=>1],
        ];
    }

    


}
