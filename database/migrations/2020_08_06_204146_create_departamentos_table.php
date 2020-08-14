<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{

    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
        });

        DB::table('departamentos')->insert(array('id'=>1,'nombre'=>'Santa Cruz'));
    }

    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
