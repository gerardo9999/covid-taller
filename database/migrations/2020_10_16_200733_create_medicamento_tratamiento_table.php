<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_tratamiento', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('cantidad');
            $table->string('indicaciones');

            $table->integer('tratamiento_id')->unsigned();
            $table->integer('medicamento_id')->unsigned();

            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');  
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');

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
        Schema::dropIfExists('medicamento_tratamiento');
    }
}
