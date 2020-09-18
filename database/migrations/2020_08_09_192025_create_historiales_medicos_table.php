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
            $table->float('altura');
            $table->float('peso');
            $table->string('alergia');
            $table->string('enfermedad');
            $table->date('fecha_registro');  
            
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->timestamps();
        });

        // DB::table('historiales_medicos')->insert(array(
        //     'altura'=> 1.70,  
        //     'peso' =>  74,
        //     'alergia'=>  'ninguna',
        //     'enfermedad'=>  'ninguna',
        //     'fecha_registro'=>  '2020-08-23',
        //     'paciente_id' => 1
        // ));
    }

    public function down(){
        Schema::dropIfExists('historiales_medicos');
    }
    
}
