<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            
            
            $table->increments('id');

            $table->string('nombre',100);

            $table->integer('tipoHabitacion_id')->unsigned();
            $table->foreign('tipoHabitacion_id')->references('id')->on('tipos_habitaciones')->onDelete('cascade');
            
            $table->integer('bloque_id')->unsigned();
            $table->foreign('bloque_id')->references('id')->on('bloques')->onDelete('cascade');
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
        Schema::dropIfExists('habitaciones');
    }
}
