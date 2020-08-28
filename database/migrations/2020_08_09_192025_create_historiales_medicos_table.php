<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesMedicosTable extends Migration
{

    public function up()
    {
        Schema::create('historiales_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('altura');
            $table->string('peso');
            $table->string('alergia');
            $table->string('enfermedad');
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