<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_consulta')->default(1);
            $table->string('evolucion_enfermedad');
            $table->string('motivo_consulta');

            $table->date('fecha_consulta');
            $table->date('fecha_programada');

            // $table->integer('historial_id')->unsigned();
            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            // $table->foreign('historial_id')->references('id')->on('historiales_medicos')->onDelete('cascade');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
