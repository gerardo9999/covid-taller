<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHospitalesTable extends Migration
{
    
    public function up()
    {
        Schema::create('hospitales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('imagen');
            $table->string('nivel',50);
            $table->bigInteger('telefono')->nullable();
            
            $table->integer('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            
            $table->timestamps();
        });

        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General I','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>1));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Japones','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>2));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Niños','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>3));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Aleman','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>4));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Obrero I','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>5));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital  Mexicano','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>6));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Santa Cruz','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>7));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Obrero II ','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>8));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>9));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Japones II','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>10));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General II','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>11));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Jesucristo','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>12));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General III','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>13));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital  Obispo Santiteban','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>14));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Warnes ','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>15));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Evo Morales','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>16));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital San jose','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>17));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Frances','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>18));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Montero','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>19));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>60368599,'direccion_id'=>20));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Cotoca','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>21));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'cuarto','telefono'=>77368599,'direccion_id'=>23));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Niño','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368599,'direccion_id'=>23));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Torno','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>60168519,'direccion_id'=>24));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de la guardia','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368339,'direccion_id'=>25));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368339,'direccion_id'=>26));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Porongo','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368339,'direccion_id'=>27));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>77364339,'direccion_id'=>28));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Porongo','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>77368339,'direccion_id'=>29));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>77364339,'direccion_id'=>30));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General San Jose','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>77368339,'direccion_id'=>31));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital San Julian','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>61064339,'direccion_id'=>32));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital San Rafael','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>77610339,'direccion_id'=>33));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>77377771,'direccion_id'=>34));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Pailon','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>77368339,'direccion_id'=>35));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>61064339,'direccion_id'=>36));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>77610339,'direccion_id'=>37));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Pailon','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>56657673,'direccion_id'=>38));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>653656235,'direccion_id'=>39));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>60098298,'direccion_id'=>40));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Pailon','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>56657673,'direccion_id'=>38));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>653656235,'direccion_id'=>39));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>60098298,'direccion_id'=>40));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Montero','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>65635635,'direccion_id'=>41));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>78278271,'direccion_id'=>42));
        // DB::table('hospitales')->insert(array('nombre'=>'Hospital Dr.','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>656810100,'direccion_id'=>43)); 
    }

    public function down()
    {
        Schema::dropIfExists('hospitales');
    }
}
