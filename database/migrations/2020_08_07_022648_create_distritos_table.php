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
            $table->string('nombre',50);

            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('distritos')->insert(array('id'=>1,'nombre'=>'1','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>2,'nombre'=>'2','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>3,'nombre'=>'3','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>4,'nombre'=>'4','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>5,'nombre'=>'5','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>6,'nombre'=>'6','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>7,'nombre'=>'7','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>8,'nombre'=>'8','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>9,'nombre'=>'9','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>10,'nombre'=>'10','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>11,'nombre'=>'11','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>12,'nombre'=>'12','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>13,'nombre'=>'13','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>14,'nombre'=>'14','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>15,'nombre'=>'15','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>16,'nombre'=>'16','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>17,'nombre'=>'17','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>18,'nombre'=>'18','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>19,'nombre'=>'19','municipio_id'=>1));
        DB::table('distritos')->insert(array('id'=>20,'nombre'=>'20','municipio_id'=>1));




        DB::table('distritos')->insert(array('id'=>21,'nombre'=>'1','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>22,'nombre'=>'2','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>23,'nombre'=>'3','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>24,'nombre'=>'4','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>25,'nombre'=>'5','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>26,'nombre'=>'6','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>27,'nombre'=>'7','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>28,'nombre'=>'8','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>29,'nombre'=>'9','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>30,'nombre'=>'10','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>31,'nombre'=>'11','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>32,'nombre'=>'12','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>33,'nombre'=>'13','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>34,'nombre'=>'14','municipio_id'=>2));
        DB::table('distritos')->insert(array('id'=>35,'nombre'=>'15','municipio_id'=>2));
 



        DB::table('distritos')->insert(array('id'=>36,'nombre'=>'1','municipio_id'=>3));
        DB::table('distritos')->insert(array('id'=>37,'nombre'=>'2','municipio_id'=>3));
        DB::table('distritos')->insert(array('id'=>38,'nombre'=>'3','municipio_id'=>3));
        DB::table('distritos')->insert(array('id'=>39,'nombre'=>'4','municipio_id'=>3));
        DB::table('distritos')->insert(array('id'=>40,'nombre'=>'5','municipio_id'=>3));
        DB::table('distritos')->insert(array('id'=>41,'nombre'=>'6','municipio_id'=>3));
        DB::table('distritos')->insert(array('id'=>42,'nombre'=>'7','municipio_id'=>3));


        DB::table('distritos')->insert(array('id'=>43,'nombre'=>'3','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>44,'nombre'=>'4','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>45,'nombre'=>'5','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>46,'nombre'=>'6','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>47,'nombre'=>'7','municipio_id'=>4));

        DB::table('distritos')->insert(array('id'=>48,'nombre'=>'8','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>49,'nombre'=>'9','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>50,'nombre'=>'10','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>51,'nombre'=>'11','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>52,'nombre'=>'12','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>53,'nombre'=>'13','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>54,'nombre'=>'14','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>55,'nombre'=>'15','municipio_id'=>4));
        DB::table('distritos')->insert(array('id'=>56,'nombre'=>'16','municipio_id'=>4));


        DB::table('distritos')->insert(array('id'=>57,'nombre'=>'17','municipio_id'=>5));
        DB::table('distritos')->insert(array('id'=>58,'nombre'=>'18','municipio_id'=>5));
        DB::table('distritos')->insert(array('id'=>59,'nombre'=>'19','municipio_id'=>5));
        DB::table('distritos')->insert(array('id'=>60,'nombre'=>'20','municipio_id'=>5));
        DB::table('distritos')->insert(array('id'=>61,'nombre'=>'21','municipio_id'=>5));


        DB::table('distritos')->insert(array('id'=>62,'nombre'=>'2','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>63,'nombre'=>'3','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>64,'nombre'=>'4','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>65,'nombre'=>'5','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>66,'nombre'=>'6','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>67,'nombre'=>'7','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>68,'nombre'=>'8','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>69,'nombre'=>'9','municipio_id'=>6));
        DB::table('distritos')->insert(array('id'=>70,'nombre'=>'10','municipio_id'=>6));




        DB::table('distritos')->insert(array('id'=>71,'nombre'=>'11','municipio_id'=>7));
        DB::table('distritos')->insert(array('id'=>72,'nombre'=>'12','municipio_id'=>7));
        DB::table('distritos')->insert(array('id'=>73,'nombre'=>'13','municipio_id'=>7));
        DB::table('distritos')->insert(array('id'=>74,'nombre'=>'14','municipio_id'=>7));
        DB::table('distritos')->insert(array('id'=>75,'nombre'=>'15','municipio_id'=>7));
        DB::table('distritos')->insert(array('id'=>76,'nombre'=>'16','municipio_id'=>7));
        DB::table('distritos')->insert(array('id'=>77,'nombre'=>'17','municipio_id'=>7));


        DB::table('distritos')->insert(array('id'=>78,'nombre'=>'8','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>79,'nombre'=>'9','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>80,'nombre'=>'10','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>81,'nombre'=>'11','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>82,'nombre'=>'12','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>83,'nombre'=>'13','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>84,'nombre'=>'14','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>85,'nombre'=>'15','municipio_id'=>8));
        DB::table('distritos')->insert(array('id'=>86,'nombre'=>'16','municipio_id'=>8));



        DB::table('distritos')->insert(array('id'=>87,'nombre'=>'17','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>88,'nombre'=>'8','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>89,'nombre'=>'9','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>90,'nombre'=>'10','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>91,'nombre'=>'11','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>92,'nombre'=>'12','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>93,'nombre'=>'13','municipio_id'=>9));
        DB::table('distritos')->insert(array('id'=>94,'nombre'=>'14','municipio_id'=>9));




        DB::table('distritos')->insert(array('id'=>95,'nombre'=>'5','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>96,'nombre'=>'6','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>97,'nombre'=>'7','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>98,'nombre'=>'8','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>99,'nombre'=>'9','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>100,'nombre'=>'10','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>101,'nombre'=>'11','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>102,'nombre'=>'12','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>103,'nombre'=>'13','municipio_id'=>10));
        DB::table('distritos')->insert(array('id'=>104,'nombre'=>'14','municipio_id'=>10));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distritos');
    }
}
