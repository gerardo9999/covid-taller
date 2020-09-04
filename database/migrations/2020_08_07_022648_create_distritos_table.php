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

        //Distrito 1

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'10','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'11','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'12','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'13','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'14','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'15','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'16','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'17','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'18','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'19','municipio_id'=>1));
        DB::table('distritos')->insert(array('nombre'=>'20','municipio_id'=>1));




        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'10','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'11','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'12','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'13','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'14','municipio_id'=>2));
        DB::table('distritos')->insert(array('nombre'=>'15','municipio_id'=>2));
 



        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>3));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>3));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>3));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>3));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>3));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>3));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>3));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>4));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>4));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>4));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>5));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>5));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>5));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>5));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>5));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>6));
        DB::table('distritos')->insert(array('nombre'=>'10','municipio_id'=>6));




        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>7));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>7));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>8));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>8));



        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>9));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>9));




        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>10));
        DB::table('distritos')->insert(array('nombre'=>'10','municipio_id'=>10));



        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>11));
        DB::table('distritos')->insert(array('nombre'=>'10','municipio_id'=>11));




        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>12));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>12));



        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>13));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>13));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>13));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>13));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>13));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>13));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>14));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>14));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>15));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>15));


        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>16));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>16));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>17));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>17));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>18));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>18));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>18));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>19));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>19));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>20));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>20));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>21));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>21));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>22));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>22));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>23));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>23));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>23));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>24));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>24));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>25));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>25));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>26));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>26));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>27));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>27));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>28));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>28));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>29));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>29));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>30));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>30));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>31));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>31));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>32));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>32));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>33));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>33));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>34));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>34));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>35));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>35));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>36));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>36));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>37));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>37));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>38));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>38));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>39));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>39));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>40));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>40));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>41));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>41));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>42));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>42));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>43));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>43));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>44));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>44));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>45));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>45));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>46));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>46));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>47));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>47));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>48));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>48));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>49));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>49));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>50));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>50));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>51));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>51));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>52));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>52));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>53));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>53));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>54));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>54));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>55));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>55));

        DB::table('distritos')->insert(array('nombre'=>'1','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'2','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'3','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'4','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'5','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'6','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'7','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'8','municipio_id'=>56));
        DB::table('distritos')->insert(array('nombre'=>'9','municipio_id'=>56));


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
