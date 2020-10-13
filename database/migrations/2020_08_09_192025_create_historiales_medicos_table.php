<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesMedicosTable extends Migration
{

    public function up()
    {
        Schema::create('historiales_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enfermedad')->nullable();
            $table->date('fecha_registro');  
            
            
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down(){
        Schema::dropIfExists('historiales_medicos');
    }
    
}
//                                                                     peso , 


// Registro        historial        dato_medico
//    1                1                1 examen fisico
//                     2                2 
//                     3                3
//                     4                4
//                                      5
                                     