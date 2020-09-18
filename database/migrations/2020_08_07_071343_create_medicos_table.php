<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    
    public function up(){
        Schema::create('medicos', function (Blueprint $table) {
        
            $table->increments('id');
            $table->bigInteger('codigo_medico');


            $table->integer('especialidad_id')->unsigned();

            $table->integer('hospital_id')->unsigned();

            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');

            $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade');
            $table->foreign('hospital_id')->references('id')->on('hospitales')->onDelete('cascade');
            $table->timestamps();
        
        });
        // DB::table('medicos')->insert(array('id'=>5,'codigo_medico'=>76786733,'especialidad_id'=>1,'hospital_id'=>1));

    }


    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
