<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalesTable extends Migration
{
    
    public function up()
    {
        Schema::create('hospitales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('imagen');
            $table->string('nivel',50);
            $table->string('telefono',20)->nullable();
            $table->integer('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('hospitales');
    }
}
