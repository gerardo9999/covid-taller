<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avenida_calle',200);
            $table->string('numero_domicilio',10);
            $table->string('barrio_zona',100);
            $table->integer('distrito_id')->unsigned();

            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('direcciones')->insert(array('id'=>1,'avenida_calle'=>'','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
    }


    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
