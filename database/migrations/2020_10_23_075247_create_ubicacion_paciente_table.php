<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionPacienteTable extends Migration{
    public function up()
    {
        Schema::create('ubicacion_paciente', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha_asignacion');
            $table->date('fecha_entrada')->nullable();
            $table->date('fecha_salida')->nullable();

            $table->integer('paciente_id')->unsigned();
            $table->integer('ubicacion_id')->unsigned();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion')->onDelete('cascade');

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('ubicacion_paciente');
    }
}
