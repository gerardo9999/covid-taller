<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('nombre')->unsigned();

            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('distritos');
    }
}
