<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{

    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('etapa')->nullable();
            $table->integer('paciente_tratamiento_id')->unsigned();
            
            $table->foreign('paciente_tratamiento_id')->references('id')->on('paciente_tratamiento')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seguimientos');
    }
}
