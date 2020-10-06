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
            $table->date('fecha_realizado');
            $table->date('fecha_resultado')->nullable();
            $table->boolean('estado')->default(0);
            $table->string('descripcion')->nullable();
            $table->string('resultado')->nullable();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');      
            
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipo_examen')->onDelete('cascade');      
            $table->timestamps();
        });   
    }


    public function down()
    {
        Schema::dropIfExists('examenes');
    }
}
