<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pregunta');
            // $table->timestamps();
        });

        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted esta con tos?'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted tiene fiebre?'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted tiene dolor de cabeza'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted esta con malestar en general'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted esta con dolor de cabeza'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted esta con escalosfrios? '));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted esta con diarrea?'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted esta con perdida del olfato o ha sentido disminución en persección de olores?'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted tiene dificultad para respirar?(como si no entrará el aire al pecho)'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted presenta deterioro general de sus movimientos?'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted a viajado estos ultimos 15 dias?'));
        DB::table('preguntas')->insert(array('pregunta'=> ' ¿Usted a estado en una area de casos positivos de COVIS-19 o en contacto directo con alguna persona que dio positivo de COVID-19'));    
    }

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
