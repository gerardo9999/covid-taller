<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioTable extends Migration
{

    
    public function up()
    {
        Schema::create('cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota');
            $table->string('probabilidad');

            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cuestionario');
    }
}
