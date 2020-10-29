<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionTable extends Migration
{
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            
            
            $table->increments('id');
            $table->string('numero_sala');
            $table->string('numero_cama');

            $table->integer('hospital_id')->unsigned();

            $table->foreign('hospital_id')->references('id')->on('hospitales')->onDelete('cascade');

            $table->timestamps();
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
