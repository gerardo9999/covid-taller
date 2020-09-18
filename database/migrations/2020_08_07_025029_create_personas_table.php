<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            
 

            $table->increments('id');
            $table->string('nombre',50)->nullable();
            $table->string('apellidos',50)->nullable();
            $table->bigInteger('ci')->nullable();

            $table->bigInteger('telefono')->nullable();
            $table->string('nacionalidad',50)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable();

            $table->integer('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            $table->timestamps();
        });
            // DB::table('personas')->insert(array('nombre'=>'German','apellidos'=>'Salaz Hurtado','ci'=>68676878,'telefono'=>765365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'hombre','direccion_id'=>116));
            // DB::table('personas')->insert(array('nombre'=>'Alejandra','apellidos'=>'ALba Mendoza','ci'=>88676878,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'mujer','direccion_id'=>117));
            // DB::table('personas')->insert(array('nombre'=>'Selena','apellidos'=>'Castedo Hurtado','ci'=>756565634,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'mujer','direccion_id'=>118));
            // DB::table('personas')->insert(array('nombre'=>'Carla','apellidos'=>'Colque Subirana','ci'=>98239383,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'mujer','direccion_id'=>119));
            // DB::table('personas')->insert(array('nombre'=>'Daniel','apellidos'=>'Cuella Duran','ci'=>901090222,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'hombre','direccion_id'=>220));
            // DB::table('personas')->insert(array('nombre'=>'Diana','apellidos'=>'Hurtado Diaz','ci'=>873676332,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'mujer','direccion_id'=>221));
            // DB::table('personas')->insert(array('nombre'=>'Jose Manuel','apellidos'=>'Fernandez Ortiz','ci'=>332343242,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'hombre','direccion_id'=>222));
            // DB::table('personas')->insert(array('nombre'=>'Richard','apellidos'=>'Hurtado Hurtado','ci'=>635765367,'telefono'=>766365652,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'homre','direccion_id'=>223));
            // DB::table('personas')->insert(array('nombre'=>'Ruth Silvana','apellidos'=>'Cortés Lagunes','ci'=>878779,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>225));
            // DB::table('personas')->insert(array('nombre'=>'Ariana','apellidos'=>'jesús Ramos' ,'ci'=>87987111,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>226));
            // DB::table('personas')->insert(array('nombre'=>'Luis Felipe','apellidos'=>'Delgado Barrón Luis Felipe Gonzales ','ci'=>52735677,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>227));
            // DB::table('personas')->insert(array('nombre'=>'Andres','apellidos'=>'Espejo Ramos Hansel Andres ','ci'=>67678891,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>228));
            // DB::table('personas')->insert(array('nombre'=>'Aniyensy Sarai','apellidos'=>'Flores Aguilar ','ci'=>87337988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>229));
            // DB::table('personas')->insert(array('nombre'=>'Silva Karla','apellidos'=>'Flores  Paulette ','ci'=>87922988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>230));
            // DB::table('personas')->insert(array('nombre'=>'Montserrat Carolina','apellidos'=>'García Arreguín ','ci'=>11987988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>231));
            // DB::table('personas')->insert(array('nombre'=>'Lisset Vianey','apellidos'=>' García Orozco','ci'=>11957988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>232));
            // DB::table('personas')->insert(array('nombre'=>'José Ignacio','apellidos'=>' Gómez Vargas','ci'=>87966688,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>233));
            // DB::table('personas')->insert(array('nombre'=>'Rocio','apellidos'=>' GONZÁLEZ DÍAZ','ci'=>8889999,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>234));
            // DB::table('personas')->insert(array('nombre'=>'Cipriano Ariel','apellidos'=>'González Trejo','ci'=>87987123,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>235));
            // DB::table('personas')->insert(array('nombre'=>'Miguel Alejandro','apellidos'=>'Guerrero Padrés','ci'=>87987234,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>236));
            // DB::table('personas')->insert(array('nombre'=>'Karina','apellidos'=>'Aramayo Waime','ci'=>87987567,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>237));
            // DB::table('personas')->insert(array('nombre'=>'Danna Verónica','apellidos'=>'Hernández González','ci'=>87987789,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>238));
            // DB::table('personas')->insert(array('nombre'=>'Jaime Daniel','apellidos'=>'Hernández Palacios','ci'=>879870123,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>239));
            // DB::table('personas')->insert(array('nombre'=>'Miguel Ángel','apellidos'=>'Hernández Prado','ci'=>879873011,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>240));
            // DB::table('personas')->insert(array('nombre'=>'Luis Fernando','apellidos'=>'Herrera Arias','ci'=>879870998,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>241));
            // DB::table('personas')->insert(array('nombre'=>'Lara Samanta','apellidos'=>'Cuernavaca Morelo','ci'=>879870912,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>242));
            // DB::table('personas')->insert(array('nombre'=>'Julia Andrea','apellidos'=>'Lunar Pérez','ci'=>87980012,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>243));
            // DB::table('personas')->insert(array('nombre'=>'María','apellidos'=>'Maximov Cortés','ci'=>879870034,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>244));
            // DB::table('personas')->insert(array('nombre'=>'Pablo','apellidos'=>'Meré Hidalgo','ci'=>87987005,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>245));
            // DB::table('personas')->insert(array('nombre'=>'Diana Laura','apellidos'=>'Morales Gonzalez','ci'=>87987006,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>246));
            // DB::table('personas')->insert(array('nombre'=>'Yair','apellidos'=>'Moreno Chávez','ci'=>87987007,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>247));
            // DB::table('personas')->insert(array('nombre'=>'Aelin','apellidos'=>'Moreno Huitrón','ci'=>87987008,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>248));
            // DB::table('personas')->insert(array('nombre'=>'Jessica Lilian','apellidos'=>'Moreno Reveles','ci'=>81107988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>249));
            // DB::table('personas')->insert(array('nombre'=>'Eduardo Elihu','apellidos'=>'Munguía González','ci'=>11087988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>250));
            // DB::table('personas')->insert(array('nombre'=>'Itzel Huanímaro','apellidos'=>'Nuñez Garcia','ci'=>871102988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>251));
            // DB::table('personas')->insert(array('nombre'=>'Erandhi Claudel','apellidos'=>'Ornelas Guzmán','ci'=>83337988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>252));
            // DB::table('personas')->insert(array('nombre'=>'Adriana Azzeneth','apellidos'=>'Ortega Romero','ci'=>84447988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>253));
            // DB::table('personas')->insert(array('nombre'=>'Irma Carolina','apellidos'=>'Parga Fuentes','ci'=>87984448,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>254));
            // DB::table('personas')->insert(array('nombre'=>'Alejandra Berenice','apellidos'=>'Pérez Moreno','ci'=>55587988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>255));
            // DB::table('personas')->insert(array('nombre'=>'Yail Tsayam','apellidos'=>'Reyes Báez','ci'=>87966688,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>256));
            // DB::table('personas')->insert(array('nombre'=>'Esteban','apellidos'=>'Reyes Saldaña','ci'=>87987778,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>257));
            // DB::table('personas')->insert(array('nombre'=>'Abigail','apellidos'=>'Rodríguez Jiménez','ci'=>10087988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>258));
            // DB::table('personas')->insert(array('nombre'=>'Pablo','apellidos'=>'Rosiles Loeza','ci'=>77787988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>259));
            // DB::table('personas')->insert(array('nombre'=>'aRANXA','apellidos'=>'Ruiz vasquez','ci'=>66687988,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>260));
            // DB::table('personas')->insert(array('nombre'=>'Mariana','apellidos'=>'Sánchez Cid','ci'=>65287900,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>261));
            // DB::table('personas')->insert(array('nombre'=>'Daniel','apellidos'=>'Torres Rojas','ci'=>87900011,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>262));
            // DB::table('personas')->insert(array('nombre'=>'Daniela Ivette','apellidos'=>'Vega Hernández','ci'=>23398793,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>263));
            // DB::table('personas')->insert(array('nombre'=>'Rosa Luz','apellidos'=>'Zamora Peinado','ci'=>565327667,'telefono'=>767678772,'nacionalidad'=>'Bolivia','fecha_nacimiento'=>null,'sexo'=>'','direccion_id'=>264));            
}
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
