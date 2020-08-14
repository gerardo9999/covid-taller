<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
  
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');
            $table->string('numero_seguro',30)->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('pacientes');
    }
}
