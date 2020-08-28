<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCuestionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_cuestionario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta');
            $table->integer('nota');

            $table->integer('cuestionario_id')->unsigned();
            $table->foreign('cuestionario_id')->references('id')->on('cuestionario')->onDelete('cascade');       

            $table->integer('pregunta_id')->unsigned();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');       
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
        Schema::dropIfExists('detalle_cuestionario');
    }
}
