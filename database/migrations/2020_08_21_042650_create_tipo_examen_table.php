<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_examen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_examen');
    }
}
