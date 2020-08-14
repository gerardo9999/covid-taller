<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->timestamps();
        });
        DB::table('especialidades')->insert(array('id'=>1,'nombre'=>'Alergología'));
        DB::table('especialidades')->insert(array('id'=>2,'nombre'=>'Anestesiología'));
        DB::table('especialidades')->insert(array('id'=>3,'nombre'=>'Cardiología'));
        DB::table('especialidades')->insert(array('id'=>4,'nombre'=>'Gastroenterología'));
        DB::table('especialidades')->insert(array('id'=>5,'nombre'=>'Endocrinología'));
        DB::table('especialidades')->insert(array('id'=>6,'nombre'=>'Epidemiología'));
        DB::table('especialidades')->insert(array('id'=>7,'nombre'=>'Geriatría'));
        DB::table('especialidades')->insert(array('id'=>8,'nombre'=>'Hepatología'));
        DB::table('especialidades')->insert(array('id'=>9,'nombre'=>'Hematología'));
        DB::table('especialidades')->insert(array('id'=>10,'nombre'=>'Infectología'));
        DB::table('especialidades')->insert(array('id'=>11,'nombre'=>'Medicina aeroespacial'));
        DB::table('especialidades')->insert(array('id'=>12,'nombre'=>'Medicina del deporte'));
        DB::table('especialidades')->insert(array('id'=>13,'nombre'=>'Medicina del trabajo'));
        DB::table('especialidades')->insert(array('id'=>14,'nombre'=>'Medicina de urgencias'));
        DB::table('especialidades')->insert(array('id'=>15,'nombre'=>'Medicina familiar y comunitaria'));
        DB::table('especialidades')->insert(array('id'=>16,'nombre'=>'Medicina física y rehabilitación'));
        DB::table('especialidades')->insert(array('id'=>17,'nombre'=>'Medicina intensiva'));
        DB::table('especialidades')->insert(array('id'=>18,'nombre'=>'Medicina interna'));
        DB::table('especialidades')->insert(array('id'=>19,'nombre'=>'Medicina forense'));
        DB::table('especialidades')->insert(array('id'=>20,'nombre'=>'Medicina preventiva y salud pública'));
        DB::table('especialidades')->insert(array('id'=>21,'nombre'=>'Nefrología'));
        DB::table('especialidades')->insert(array('id'=>22,'nombre'=>'Neumología'));
        DB::table('especialidades')->insert(array('id'=>23,'nombre'=>'Neurología'));
        DB::table('especialidades')->insert(array('id'=>24,'nombre'=>'Nutriología'));
        DB::table('especialidades')->insert(array('id'=>25,'nombre'=>'Oncología médica'));
        DB::table('especialidades')->insert(array('id'=>26,'nombre'=>'Oncología radioterápica'));
        DB::table('especialidades')->insert(array('id'=>27,'nombre'=>'Pediatría'));
        DB::table('especialidades')->insert(array('id'=>28,'nombre'=>'Psiquiatría'));
        DB::table('especialidades')->insert(array('id'=>29,'nombre'=>'Reumatología'));
        DB::table('especialidades')->insert(array('id'=>30,'nombre'=>'Toxicología'));
        DB::table('especialidades')->insert(array('id'=>31,'nombre'=>'Cirugía cardíaca'));
        DB::table('especialidades')->insert(array('id'=>32,'nombre'=>'Cirugía general'));
        DB::table('especialidades')->insert(array('id'=>33,'nombre'=>'Cirugía oral y maxilofacial'));
        DB::table('especialidades')->insert(array('id'=>34,'nombre'=>'Cirugía ortopédica'));
        DB::table('especialidades')->insert(array('id'=>35,'nombre'=>'Cirugía pediátrica'));
        DB::table('especialidades')->insert(array('id'=>36,'nombre'=>'Cirugía plástica'));
        DB::table('especialidades')->insert(array('id'=>37,'nombre'=>'Cirugía torácica'));
        DB::table('especialidades')->insert(array('id'=>38,'nombre'=>'Neurocirugía'));
        DB::table('especialidades')->insert(array('id'=>39,'nombre'=>'Angiología'));
        DB::table('especialidades')->insert(array('id'=>40,'nombre'=>'Dermatología'));
        DB::table('especialidades')->insert(array('id'=>41,'nombre'=>'Ginecología y obstetricia o tocología'));
        DB::table('especialidades')->insert(array('id'=>42,'nombre'=>'Oftalmología'));
        DB::table('especialidades')->insert(array('id'=>43,'nombre'=>'Otorrinolaringología'));
        DB::table('especialidades')->insert(array('id'=>44,'nombre'=>'Urología'));
        DB::table('especialidades')->insert(array('id'=>45,'nombre'=>'Traumatología'));
        DB::table('especialidades')->insert(array('id'=>46,'nombre'=>'Análisis clínico'));
        DB::table('especialidades')->insert(array('id'=>47,'nombre'=>'Anatomía patológica'));
        DB::table('especialidades')->insert(array('id'=>48,'nombre'=>'Bioquímica clínica'));
        DB::table('especialidades')->insert(array('id'=>49,'nombre'=>'Farmacología'));
        DB::table('especialidades')->insert(array('id'=>50,'nombre'=>'Genética médica'));
        DB::table('especialidades')->insert(array('id'=>51,'nombre'=>'Inmunología'));
        DB::table('especialidades')->insert(array('id'=>52,'nombre'=>'Medicina nuclear'));
        DB::table('especialidades')->insert(array('id'=>53,'nombre'=>'Microbiología y parasitología'));
        DB::table('especialidades')->insert(array('id'=>54,'nombre'=>'Neurofisiología clínica'));
        DB::table('especialidades')->insert(array('id'=>55,'nombre'=>'Radiología'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades');
    }
}
