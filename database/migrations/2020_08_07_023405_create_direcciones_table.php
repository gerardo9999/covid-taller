<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avenida_calle',200);
            $table->string('numero_domicilio',10);
            $table->string('barrio_zona',100);
            $table->integer('distrito_id')->unsigned();

            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('direcciones')->insert(array('avenida_calle'=>'','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));





                DB::table('direcciones')->insert(array('avenida_calle'=>'Warnes','numero_domicilio'=>'233','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Bolivar','numero_domicilio'=>'234','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Santa Cruz','numero_domicilio'=>'4545','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av Melchor','numero_domicilio'=>'667','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av Guarani','numero_domicilio'=>'561','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Independiente','numero_domicilio'=>'123','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Quijarro','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Quijaro','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Porongo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Piso Firme','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Peji','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Enconada','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Urina','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Choreti','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Chochís','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Choboreca','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Chinguri','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Chilón','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Cbo. José Toledo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Cañaveral','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Cañada Larga','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Carnaval','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Caripui','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Caranda','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Cap. Humberto Salinas','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Camino A Montecristo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Cambódromo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Camba Pechí','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Camatindi','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Willy Bendek','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Warnes','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Villa Bella','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Venezuela','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Velasco','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Vallegrande','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Usuri','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Urucú','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'La Higuera','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Universo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Turuguapa','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Tulipanes','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Tucan','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Tarbo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Sumuqué','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Sucre','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Stig Ryden','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Severo Vásquez Machicado','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Serere','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Senda','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Saturnino Saucedo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Sara','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Santiago Ortiz','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Santa Rosa De Lima','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Santa Barbara','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Sandia','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle San Pablo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle San Luis De Cáceres','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle San Juan De Chacarilla','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle San Jorge','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle San Javier','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle San German','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Río Purús','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Río Mataracú','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Río Jipa','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Río Chontal','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Rurrenabaque','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Reyes Cardona','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Republiquetas','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle René Moreno','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Regimiento Lanza','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Regimiento 24','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Raquel Becerra De Busch','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Ramón Clouzet','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Rafael Peña','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Quitachiyú','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Calle Quimorí','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Ichilo','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Hugo Wast (5 Este)','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Horcones','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Hebreos','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Hardeman','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Gálatas','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Guerra Del Acre','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Guarayos','numero_domicilio'=>'','barrio_zona'=>'','distrito_id'=>1));

    }
    // Link de calles 
    // https://moovitapp.com/index/es-419/transporte_p%C3%BAblico-streets-Santa_Cruz_de_la_Sierra-2-4977

    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
