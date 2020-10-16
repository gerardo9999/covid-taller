<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');

            


            

            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();
            // $table->integer('prescripcion_id')->unsigned();


            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
