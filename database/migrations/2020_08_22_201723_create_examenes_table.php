<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resultado');
            $table->string('tipo');
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');      
            
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipo_examen')->onDelete('cascade');      
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenes');
    }
}
