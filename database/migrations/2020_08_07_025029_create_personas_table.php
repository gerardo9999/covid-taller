<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            


            $table->increments('id');
            $table->string('nombre',50)->nullable();
            $table->string('apellidos',50)->nullable();
            $table->string('ci')->nullable();

            $table->string('telefono',20)->nullable();
            $table->string('nacionalidad',50)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable();

            $table->integer('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
