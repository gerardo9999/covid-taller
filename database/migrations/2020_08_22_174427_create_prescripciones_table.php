<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_producto')->unsigned();
            $table->string('medicamento');
            $table->string('indicaciones');
            $table->integer('consulta_id')->unsigned()->nullable();

            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');

            
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
        Schema::dropIfExists('prescripciones');
    }
}
