<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departamento;
use Faker\Generator as Faker;

$factory->define(Departamento::class, function (Faker $faker) {
    return insertarDepartamentos();
});



function arrayDepartamentos(){
    return [
        
            'Santa Cruz'
        
    ];
}
function insertarDepartamentos(){
    
    $arrayDepartamento = arrayDepartamentos();
    $departamentoLength =  count($arrayDepartamento);

    for ($i=0; $i < $departamentoLength; $i++) { 
        
        $departamento = new Departamento();
        $departamento->nombre = $arrayDepartamento[$i];
        $departamento->save();
    }
}
