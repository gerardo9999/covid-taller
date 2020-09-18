<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);

            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');

            // $table->timestamps();
        });


        DB::table('provincias')->insert(array('id'=>1, 'nombre'=>'Provincia Andrés Ibáñez','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>2, 'nombre'=>'Provincia Ángel Sandoval','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>3, 'nombre'=>'Provincia Chiquitos','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>4, 'nombre'=>'Provincia Cordillera','departamento_id'=>1));        
        DB::table('provincias')->insert(array('id'=>5, 'nombre'=>'Provincia Florida','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>6, 'nombre'=>'Provincia Germán Busch','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>7, 'nombre'=>'Provincia Guarayos','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>8, 'nombre'=>'Provincia Ichilo','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>9, 'nombre'=>'Provincia José Miguel de Velasco','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>10,'nombre'=>'Provincia Manuel María Caballero','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>11,'nombre'=>'Provincia Ñuflo de Chávez','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>12,'nombre'=>'Provincia Obispo Santisteban','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>13,'nombre'=>'Provincia Sara','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>14,'nombre'=>'Provincia Vallegrande','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>15,'nombre'=>'Provincia Warnes','departamento_id'=>1));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
