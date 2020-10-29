<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('paciente_tratamiento', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha');
            $table->integer('dias')->unsigned();

            $table->integer('tratamiento_id')->unsigned();
            $table->integer('paciente_id')->unsigned();
            $table->boolean('estado')->default(1);

            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');  
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paciente_tratamiento');
    }
}
