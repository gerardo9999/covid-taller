<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
  
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');
            $table->bigInteger('numero_seguro')->nullable();
            $table->timestamps();
        });


    }

    
    public function down(){
        Schema::dropIfExists('pacientes');
    }
}
