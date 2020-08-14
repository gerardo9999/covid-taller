<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesMedicosTable extends Migration
{

    public function up()
    {
        Schema::create('historiales_medicos', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();
        });
    }

 
    public function down(){
        Schema::dropIfExists('historiales_medicos');
    }
}
