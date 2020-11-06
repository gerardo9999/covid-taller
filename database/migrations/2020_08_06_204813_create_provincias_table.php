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


        DB::table('provincias')->insert(array('id'=>1, 'nombre'=>'Andrés Ibáñez','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>2, 'nombre'=>'Ángel Sandoval','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>3, 'nombre'=>'Chiquitos','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>4, 'nombre'=>'Cordillera','departamento_id'=>1));        
        DB::table('provincias')->insert(array('id'=>5, 'nombre'=>'Florida','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>6, 'nombre'=>'Germán Busch','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>7, 'nombre'=>'Guarayos','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>8, 'nombre'=>'Ichilo','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>9, 'nombre'=>'José Miguel de Velasco','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>10,'nombre'=>'Manuel María Caballero','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>11,'nombre'=>'Ñuflo de Chávez','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>12,'nombre'=>'Obispo Santisteban','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>13,'nombre'=>'Sara','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>14,'nombre'=>'Vallegrande','departamento_id'=>1));
        DB::table('provincias')->insert(array('id'=>15,'nombre'=>'Warnes','departamento_id'=>1));

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
