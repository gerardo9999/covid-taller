<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);

            $table->integer('provincia_id')->unsigned();
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
            $table->timestamps();
        });

        /*5 municipios*/
        DB::table('municipios')->insert(array('id'=>1,'nombre'=>'Santa Cruz de la Sierra','provincia_id'=>1));
        DB::table('municipios')->insert(array('id'=>2,'nombre'=>'Cotoca','provincia_id'=>1));
        DB::table('municipios')->insert(array('id'=>3,'nombre'=>'El Torno','provincia_id'=>1));
        DB::table('municipios')->insert(array('id'=>4,'nombre'=>'La guardia','provincia_id'=>1));
        DB::table('municipios')->insert(array('id'=>5,'nombre'=>'Porongo','provincia_id'=>1));

        /*1 municipio*/
        DB::table('municipios')->insert(array('id'=>6,'nombre'=>'San Matías','provincia_id'=>2));

        /*3 municipio*/
        DB::table('municipios')->insert(array('id'=>7,'nombre'=>'San José de Chiquitos','provincia_id'=>3));
        DB::table('municipios')->insert(array('id'=>8,'nombre'=>'Pailón','provincia_id'=>3));
        DB::table('municipios')->insert(array('id'=>9,'nombre'=>'Roboré','provincia_id'=>3));

        /*7 municipio*/
        DB::table('municipios')->insert(array('id'=>10,'nombre'=>'Lagunillas','provincia_id'=>4));
        DB::table('municipios')->insert(array('id'=>11,'nombre'=>'Boyuibe','provincia_id'=>4));
        DB::table('municipios')->insert(array('id'=>12,'nombre'=>'Cabezas','provincia_id'=>4));

        DB::table('municipios')->insert(array('id'=>13,'nombre'=>'Camiri','provincia_id'=>4));
        DB::table('municipios')->insert(array('id'=>14,'nombre'=>'Charagua','provincia_id'=>4));
        DB::table('municipios')->insert(array('id'=>15,'nombre'=>'Cuevo','provincia_id'=>4));
        DB::table('municipios')->insert(array('id'=>16,'nombre'=>'Gutfiérrez','provincia_id'=>4));

        /*4 municipio*/
        DB::table('municipios')->insert(array('id'=>17,'nombre'=>'Samaipata','provincia_id'=>5));
        DB::table('municipios')->insert(array('id'=>18,'nombre'=>'Mairana','provincia_id'=>5));
        DB::table('municipios')->insert(array('id'=>19,'nombre'=>'Pampa grande','provincia_id'=>5));
        DB::table('municipios')->insert(array('id'=>20,'nombre'=>'Quirusillas','provincia_id'=>5));

        /*3 municipio*/
        DB::table('municipios')->insert(array('id'=>21,'nombre'=>'Puerto Suárez','provincia_id'=>6));
        DB::table('municipios')->insert(array('id'=>22,'nombre'=>'Carmen Rivero','provincia_id'=>6));
        DB::table('municipios')->insert(array('id'=>23,'nombre'=>'Puerto Quijarro','provincia_id'=>6));

        /*3 municipio*/
        DB::table('municipios')->insert(array('id'=>24,'nombre'=>'Ascensión de Guarayos','provincia_id'=>7));
        DB::table('municipios')->insert(array('id'=>25,'nombre'=>'El puente','provincia_id'=>7));
        DB::table('municipios')->insert(array('id'=>26,'nombre'=>'Urubichá','provincia_id'=>7));

        /*4 municipio*/
        DB::table('municipios')->insert(array('id'=>27,'nombre'=>'Buena vista','provincia_id'=>8));
        DB::table('municipios')->insert(array('id'=>28,'nombre'=>'San Carlos','provincia_id'=>8));
        DB::table('municipios')->insert(array('id'=>29,'nombre'=>'Yapacani','provincia_id'=>8));
        DB::table('municipios')->insert(array('id'=>30,'nombre'=>'San Juan de Yapacaní','provincia_id'=>8));


        /*3 municipio*/
        DB::table('municipios')->insert(array('id'=>31,'nombre'=>'San Ignacio de Velasco','provincia_id'=>9));
        DB::table('municipios')->insert(array('id'=>32,'nombre'=>'San Miguel de Velasco','provincia_id'=>9));
        DB::table('municipios')->insert(array('id'=>33,'nombre'=>'San Rafael de Velasco','provincia_id'=>9));

        /*2 municipio*/
        DB::table('municipios')->insert(array('id'=>34,'nombre'=>'Comarapa','provincia_id'=>10));
        DB::table('municipios')->insert(array('id'=>35,'nombre'=>'Saipina','provincia_id'=>10));

        /*6 municipios*/
        DB::table('municipios')->insert(array('id'=>36,'nombre'=>'Concepción','provincia_id'=>11));
        DB::table('municipios')->insert(array('id'=>37,'nombre'=>'Cuatro Cañadas','provincia_id'=>11));
        DB::table('municipios')->insert(array('id'=>38,'nombre'=>'San Antonio del Lomerío','provincia_id'=>11));
        DB::table('municipios')->insert(array('id'=>39,'nombre'=>'San Julián','provincia_id'=>11));
        DB::table('municipios')->insert(array('id'=>40,'nombre'=>'San Ramón','provincia_id'=>11));
        DB::table('municipios')->insert(array('id'=>41,'nombre'=>'San Xavier','provincia_id'=>11));

        /*6 municipios*/
        DB::table('municipios')->insert(array('id'=>42,'nombre'=>'General Agustín Saavedra','provincia_id'=>12));
        DB::table('municipios')->insert(array('id'=>43,'nombre'=>'Montero','provincia_id'=>12));
        DB::table('municipios')->insert(array('id'=>44,'nombre'=>'Minero','provincia_id'=>12));
        DB::table('municipios')->insert(array('id'=>45,'nombre'=>'Fernández Alonso','provincia_id'=>12));
        DB::table('municipios')->insert(array('id'=>46,'nombre'=>'San Pedro','provincia_id'=>12));

        DB::table('municipios')->insert(array('id'=>47,'nombre'=>'Portachuelo','provincia_id'=>13));
        DB::table('municipios')->insert(array('id'=>48,'nombre'=>'Colpa Bélgica','provincia_id'=>13));
        DB::table('municipios')->insert(array('id'=>49,'nombre'=>'Santa Rosa del Sara','provincia_id'=>13));

        DB::table('municipios')->insert(array('id'=>50,'nombre'=>'Moro Moro','provincia_id'=>14));
        DB::table('municipios')->insert(array('id'=>51,'nombre'=>'Ballegrande','provincia_id'=>14));
        DB::table('municipios')->insert(array('id'=>52,'nombre'=>'el Trigal','provincia_id'=>14));
        DB::table('municipios')->insert(array('id'=>53,'nombre'=>'Postrervalle','provincia_id'=>14));
        DB::table('municipios')->insert(array('id'=>54,'nombre'=>'Cupará','provincia_id'=>14));

        DB::table('municipios')->insert(array('id'=>55,'nombre'=>'Warnes','provincia_id'=>15));
        DB::table('municipios')->insert(array('id'=>56,'nombre'=>'Okinawa','provincia_id'=>15));
    }

    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
