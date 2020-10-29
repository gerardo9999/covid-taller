<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoRegistroTable extends Migration
{
 
    public function up()
    {
        Schema::create('seguimiento_registro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado')->nullable();

            $table->string('evolucion_enfermedad')->nullable();

            $table->integer('seguimiento_id')->unsigned();
            $table->integer('registro_id')->unsigned();

            $table->foreign('seguimiento_id')->references('id')->on('seguimientos')->onDelete('cascade');
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('seguimiento_registro');
    }
}
