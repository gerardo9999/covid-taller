<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_registro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado')->nullable();
            $table->string('evolucion_enfermedad')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('seguimiento_registro');
    }
}
