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
            $table->bigInteger('numero_domicilio');
            $table->string('barrio_zona',100);
            $table->integer('distrito_id')->unsigned();

            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            // $table->timestamps();
        });


        // Direcciones de Hospitales

            // DB::table('direcciones')->insert(array('id'=>1,'avenida_calle'=>'C/Mexico','numero_domicilio'=>455,'barrio_zona'=>'1er Anillo','distrito_id'=>1));


            // DB::table('direcciones')->insert(array('id'=>2,'avenida_calle'=>'Melchor Pinto','numero_domicilio'=>654,'barrio_zona'=>'Norte','distrito_id'=>2));
            // DB::table('direcciones')->insert(array('id'=>3,'avenida_calle'=>'Independencia','numero_domicilio'=>1230,'barrio_zona'=>'Av circunvalacion','distrito_id'=>10));
            // DB::table('direcciones')->insert(array('id'=>4,'avenida_calle'=>'Warnes','numero_domicilio'=>1443,'barrio_zona'=>'Sur','distrito_id'=>11));
            // DB::table('direcciones')->insert(array('id'=>5,'avenida_calle'=>'Av. Meneses','numero_domicilio'=>4123,'barrio_zona'=>'Z/norte','distrito_id'=>3));
            // DB::table('direcciones')->insert(array('id'=>6,'avenida_calle'=>'Av. Santa Cruz','numero_domicilio'=>5652,'barrio_zona'=>'Z/norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>7,'avenida_calle'=>'Av. Montero','numero_domicilio'=>233,'barrio_zona'=>'Z/norte','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>8,'avenida_calle'=>'C/ Monte Carlo','numero_domicilio'=>900,'barrio_zona'=>'Z/norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>9,'avenida_calle'=>'Av. Edita Arias','numero_domicilio'=>322,'barrio_zona'=>'Z/norte','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>10,'avenida_calle'=>'Av. Colombia','numero_domicilio'=>766,'barrio_zona'=>'Z/norte','distrito_id'=>19));
            // DB::table('direcciones')->insert(array('id'=>11,'avenida_calle'=>'Av. Manchego','numero_domicilio'=>122,'barrio_zona'=>'Z/norte','distrito_id'=>20));
            // DB::table('direcciones')->insert(array('id'=>12,'avenida_calle'=>'Av. Cochabamba','numero_domicilio'=>777,'barrio_zona'=>'Z/norte','distrito_id'=>18));
            // DB::table('direcciones')->insert(array('id'=>13,'avenida_calle'=>'Av. La Paz','numero_domicilio'=>544,'barrio_zona'=>'Z/norte','distrito_id'=>17));
            // DB::table('direcciones')->insert(array('id'=>14,'avenida_calle'=>'C/ Daniel Ribero','numero_domicilio'=>1022,'barrio_zona'=>'Z/norte','distrito_id'=>16));
            // DB::table('direcciones')->insert(array('id'=>15,'avenida_calle'=>'Av. 3 pasos al frente','numero_domicilio'=>765,'barrio_zona'=>'Z/norte','distrito_id'=>15));
            // DB::table('direcciones')->insert(array('id'=>16,'avenida_calle'=>'Av. Caiman','numero_domicilio'=>332,'barrio_zona'=>'Z/norte','distrito_id'=>11));
            // DB::table('direcciones')->insert(array('id'=>17,'avenida_calle'=>'Av. Norte','numero_domicilio'=>101,'barrio_zona'=>'Z/norte','distrito_id'=>12));
            // DB::table('direcciones')->insert(array('id'=>18,'avenida_calle'=>'Av. Pirai','numero_domicilio'=>1022,'barrio_zona'=>'Z/norte','distrito_id'=>14));
            // DB::table('direcciones')->insert(array('id'=>19,'avenida_calle'=>'Av. Ballegrander','numero_domicilio'=>435,'barrio_zona'=>'Z/norte','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>20,'avenida_calle'=>'Av. Cristo','numero_domicilio'=>101,'barrio_zona'=>'Z/norte','distrito_id'=>8));
            // DB::table('direcciones')->insert(array('id'=>21,'avenida_calle'=>'C/Santa cruz','numero_domicilio'=>322,'barrio_zona'=>'Central','distrito_id'=>21));
            // DB::table('direcciones')->insert(array('id'=>22,'avenida_calle'=>'C/Central','numero_domicilio'=>322,'barrio_zona'=>'Z/norte','distrito_id'=>22));
            // DB::table('direcciones')->insert(array('id'=>23,'avenida_calle'=>'C/5','numero_domicilio'=>322,'barrio_zona'=>'Z/Sur','distrito_id'=>23));
            // DB::table('direcciones')->insert(array('id'=>24,'avenida_calle'=>'C/Florida','numero_domicilio'=>522,'barrio_zona'=>'Central','distrito_id'=>21));
            // DB::table('direcciones')->insert(array('id'=>25,'avenida_calle'=>'C/La paz','numero_domicilio'=>662,'barrio_zona'=>'B/Cotoca','distrito_id'=>44));
            // DB::table('direcciones')->insert(array('id'=>26,'avenida_calle'=>'C/Cañoto','numero_domicilio'=>442,'barrio_zona'=>'Z/norte','distrito_id'=>56));
            // DB::table('direcciones')->insert(array('id'=>27,'avenida_calle'=>'C/Edita Arias','numero_domicilio'=>442,'barrio_zona'=>'B/Venezuela','distrito_id'=>57));
            // DB::table('direcciones')->insert(array('id'=>28,'avenida_calle'=>'C/Batalla del Pari','numero_domicilio'=>662,'barrio_zona'=>'B/San jose','distrito_id'=>58));
            // DB::table('direcciones')->insert(array('id'=>29,'avenida_calle'=>'C/Cidral','numero_domicilio'=>653,'barrio_zona'=>'B/San Juan','distrito_id'=>62));
            // DB::table('direcciones')->insert(array('id'=>30,'avenida_calle'=>'C/San Matias','numero_domicilio'=>660,'barrio_zona'=>'B/San San Matias','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>31,'avenida_calle'=>'C/Litoral','numero_domicilio'=>110,'barrio_zona'=>'B/','distrito_id'=>73));
            // DB::table('direcciones')->insert(array('id'=>32,'avenida_calle'=>'C/San jose','numero_domicilio'=>640,'barrio_zona'=>'B/','distrito_id'=>74));
            // DB::table('direcciones')->insert(array('id'=>33,'avenida_calle'=>'C/Santa Xruz','numero_domicilio'=>360,'barrio_zona'=>'B/','distrito_id'=>78));
            // DB::table('direcciones')->insert(array('id'=>34,'avenida_calle'=>'C/7','numero_domicilio'=>760,'barrio_zona'=>'B/','distrito_id'=>80));
            // DB::table('direcciones')->insert(array('id'=>35,'avenida_calle'=>'C/Litoral','numero_domicilio'=>110,'barrio_zona'=>'B/Villa Real','distrito_id'=>82));
            // DB::table('direcciones')->insert(array('id'=>36,'avenida_calle'=>'C/San Ramon','numero_domicilio'=>640,'barrio_zona'=>'B/Urkupiña','distrito_id'=>84));
            // DB::table('direcciones')->insert(array('id'=>37,'avenida_calle'=>'C/San Jose','numero_domicilio'=>360,'barrio_zona'=>'B/Chino','distrito_id'=>91));
            // DB::table('direcciones')->insert(array('id'=>38,'avenida_calle'=>'C/Nacional','numero_domicilio'=>1110,'barrio_zona'=>'B/','distrito_id'=>92));
            // DB::table('direcciones')->insert(array('id'=>39,'avenida_calle'=>'C/Litoral','numero_domicilio'=>1640,'barrio_zona'=>'B/Argentino','distrito_id'=>97));
            // DB::table('direcciones')->insert(array('id'=>40,'avenida_calle'=>'C/Guayaba','numero_domicilio'=>1360,'barrio_zona'=>'B/Fernandez','distrito_id'=>100));
            // DB::table('direcciones')->insert(array('id'=>41,'avenida_calle'=>'C/Nacional','numero_domicilio'=>1110,'barrio_zona'=>'B/','distrito_id'=>92));
            // DB::table('direcciones')->insert(array('id'=>42,'avenida_calle'=>'C/Litoral','numero_domicilio'=>1640,'barrio_zona'=>'B/Argentino','distrito_id'=>97));
            // DB::table('direcciones')->insert(array('id'=>43,'avenida_calle'=>'C/Guayaba','numero_domicilio'=>1360,'barrio_zona'=>'B/Fernandez','distrito_id'=>100));
            // DB::table('direcciones')->insert(array('id'=>44,'avenida_calle'=>'C/Litoral','numero_domicilio'=>810,'barrio_zona'=>'B/','distrito_id'=>429));
            // DB::table('direcciones')->insert(array('id'=>45,'avenida_calle'=>'C/5','numero_domicilio'=>10,'barrio_zona'=>'B/Guadalupe','distrito_id'=>430));
            // DB::table('direcciones')->insert(array('id'=>46,'avenida_calle'=>'C/Warnes','numero_domicilio'=>150,'barrio_zona'=>'B/Fernandez','distrito_id'=>438));
            // DB::table('direcciones')->insert(array('id'=>47,'avenida_calle'=>'C/San Jualian','numero_domicilio'=>710,'barrio_zona'=>'B/','distrito_id'=>112));
            // DB::table('direcciones')->insert(array('id'=>48,'avenida_calle'=>'C/San Ignacio','numero_domicilio'=>711,'barrio_zona'=>'B/','distrito_id'=>122));
            // DB::table('direcciones')->insert(array('id'=>49,'avenida_calle'=>'C/4','numero_domicilio'=>713,'barrio_zona'=>'B/','distrito_id'=>123));
            // DB::table('direcciones')->insert(array('id'=>50,'avenida_calle'=>'C/General','numero_domicilio'=>453,'barrio_zona'=>'B/','distrito_id'=>132));
            // DB::table('direcciones')->insert(array('id'=>51,'avenida_calle'=>'C/Litoral','numero_domicilio'=>566,'barrio_zona'=>'B/','distrito_id'=>134));
            // DB::table('direcciones')->insert(array('id'=>52,'avenida_calle'=>'C/Mendoza','numero_domicilio'=>710,'barrio_zona'=>'B/','distrito_id'=>138));
            // DB::table('direcciones')->insert(array('id'=>53,'avenida_calle'=>'C/Charagua','numero_domicilio'=>892,'barrio_zona'=>'B/','distrito_id'=>141));
            // DB::table('direcciones')->insert(array('id'=>54,'avenida_calle'=>'C/Chindilo','numero_domicilio'=>7676,'barrio_zona'=>'B/','distrito_id'=>145));
            // DB::table('direcciones')->insert(array('id'=>55,'avenida_calle'=>'C/Urkupiña','numero_domicilio'=>322,'barrio_zona'=>'B/','distrito_id'=>151));
            // DB::table('direcciones')->insert(array('id'=>56,'avenida_calle'=>'C/Samaipata','numero_domicilio'=>988,'barrio_zona'=>'B/','distrito_id'=>156));
            // DB::table('direcciones')->insert(array('id'=>57,'avenida_calle'=>'C/Arenales','numero_domicilio'=>543,'barrio_zona'=>'B/','distrito_id'=>163));
            // DB::table('direcciones')->insert(array('id'=>58,'avenida_calle'=>'C/San Antonio','numero_domicilio'=>1001,'barrio_zona'=>'B/','distrito_id'=>168));
            // DB::table('direcciones')->insert(array('id'=>59,'avenida_calle'=>'C/Santa Teresa','numero_domicilio'=>1002,'barrio_zona'=>'B/','distrito_id'=>170));
            // DB::table('direcciones')->insert(array('id'=>60,'avenida_calle'=>'C/San Jorge','numero_domicilio'=>866,'barrio_zona'=>'B/','distrito_id'=>173));
            // DB::table('direcciones')->insert(array('id'=>61,'avenida_calle'=>'C/Maria','numero_domicilio'=>455,'barrio_zona'=>'B/','distrito_id'=>184));
            // DB::table('direcciones')->insert(array('id'=>62,'avenida_calle'=>'C/La ponderosa','numero_domicilio'=>554,'barrio_zona'=>'B/','distrito_id'=>188));
            // DB::table('direcciones')->insert(array('id'=>63,'avenida_calle'=>'C/Litoral','numero_domicilio'=>133,'barrio_zona'=>'B/','distrito_id'=>199));
            // DB::table('direcciones')->insert(array('id'=>64,'avenida_calle'=>'C/Daniel Ribero','numero_domicilio'=>110,'barrio_zona'=>'B/','distrito_id'=>206));
            // DB::table('direcciones')->insert(array('id'=>65,'avenida_calle'=>'C/Quirusilla','numero_domicilio'=>820,'barrio_zona'=>'B/','distrito_id'=>209));
            // DB::table('direcciones')->insert(array('id'=>66,'avenida_calle'=>'C/Batalla del toapate','numero_domicilio'=>813,'barrio_zona'=>'B/','distrito_id'=>217));
            // DB::table('direcciones')->insert(array('id'=>67,'avenida_calle'=>'C/Broao','numero_domicilio'=>988,'barrio_zona'=>'B/','distrito_id'=>219));
            // DB::table('direcciones')->insert(array('id'=>68,'avenida_calle'=>'C/El tigre','numero_domicilio'=>766,'barrio_zona'=>'B/','distrito_id'=>227));
            // DB::table('direcciones')->insert(array('id'=>69,'avenida_calle'=>'C/MatoGroso','numero_domicilio'=>120,'barrio_zona'=>'B/','distrito_id'=>229));
            // DB::table('direcciones')->insert(array('id'=>70,'avenida_calle'=>'C/Minero','numero_domicilio'=>123,'barrio_zona'=>'B/','distrito_id'=>242));
            // DB::table('direcciones')->insert(array('id'=>71,'avenida_calle'=>'C/Collawa','numero_domicilio'=>345,'barrio_zona'=>'B/','distrito_id'=>247));
            // DB::table('direcciones')->insert(array('id'=>72,'avenida_calle'=>'C/Beni','numero_domicilio'=>655,'barrio_zona'=>'B/','distrito_id'=>250));
            // DB::table('direcciones')->insert(array('id'=>73,'avenida_calle'=>'C/4','numero_domicilio'=>710,'barrio_zona'=>'B/','distrito_id'=>256));
            // DB::table('direcciones')->insert(array('id'=>74,'avenida_calle'=>'C/4','numero_domicilio'=>598,'barrio_zona'=>'B/','distrito_id'=>269));
            // DB::table('direcciones')->insert(array('id'=>75,'avenida_calle'=>'C/7','numero_domicilio'=>433,'barrio_zona'=>'B/','distrito_id'=>278));
            // DB::table('direcciones')->insert(array('id'=>76,'avenida_calle'=>'C/Litoral','numero_domicilio'=>540,'barrio_zona'=>'B/','distrito_id'=>270));
            // DB::table('direcciones')->insert(array('id'=>77,'avenida_calle'=>'C/San Pablo','numero_domicilio'=>534,'barrio_zona'=>'B/','distrito_id'=>275));
            // DB::table('direcciones')->insert(array('id'=>78,'avenida_calle'=>'C/San Carlos','numero_domicilio'=>611,'barrio_zona'=>'B/','distrito_id'=>279));
            // DB::table('direcciones')->insert(array('id'=>79,'avenida_calle'=>'C/Litoral','numero_domicilio'=>100,'barrio_zona'=>'B/','distrito_id'=>286));
            // DB::table('direcciones')->insert(array('id'=>80,'avenida_calle'=>'C/Montero','numero_domicilio'=>1006,'barrio_zona'=>'B/','distrito_id'=>299));
            // DB::table('direcciones')->insert(array('id'=>81,'avenida_calle'=>'C/Manore','numero_domicilio'=>310,'barrio_zona'=>'B/','distrito_id'=>307));
            // DB::table('direcciones')->insert(array('id'=>82,'avenida_calle'=>'C/Yanqui','numero_domicilio'=>410,'barrio_zona'=>'B/','distrito_id'=>307));
            // DB::table('direcciones')->insert(array('id'=>83,'avenida_calle'=>'C/5','numero_domicilio'=>1810,'barrio_zona'=>'B/','distrito_id'=>308));
            // DB::table('direcciones')->insert(array('id'=>84,'avenida_calle'=>'C/Litoral','numero_domicilio'=>850,'barrio_zona'=>'B/','distrito_id'=>319));
            // DB::table('direcciones')->insert(array('id'=>85,'avenida_calle'=>'C/Cañoto','numero_domicilio'=>990,'barrio_zona'=>'B/','distrito_id'=>317));
            // DB::table('direcciones')->insert(array('id'=>86,'avenida_calle'=>'C/Independencia','numero_domicilio'=>800,'barrio_zona'=>'B/','distrito_id'=>319));
            // DB::table('direcciones')->insert(array('id'=>87,'avenida_calle'=>'C/Litoral','numero_domicilio'=>565,'barrio_zona'=>'B/','distrito_id'=>326));
            // DB::table('direcciones')->insert(array('id'=>88,'avenida_calle'=>'C/La paz','numero_domicilio'=>8878,'barrio_zona'=>'B/','distrito_id'=>380));
            // DB::table('direcciones')->insert(array('id'=>89,'avenida_calle'=>'C/Litoral','numero_domicilio'=>654,'barrio_zona'=>'B/','distrito_id'=>380));
            // DB::table('direcciones')->insert(array('id'=>90,'avenida_calle'=>'C/10','numero_domicilio'=>106,'barrio_zona'=>'B/','distrito_id'=>339));
            // DB::table('direcciones')->insert(array('id'=>91,'avenida_calle'=>'C/6 de agosto','numero_domicilio'=>811,'barrio_zona'=>'B/','distrito_id'=>348));
            // DB::table('direcciones')->insert(array('id'=>92,'avenida_calle'=>'C/San Ignacio','numero_domicilio'=>702,'barrio_zona'=>'B/','distrito_id'=>349));
            // DB::table('direcciones')->insert(array('id'=>93,'avenida_calle'=>'C/Saipina','numero_domicilio'=>1010,'barrio_zona'=>'B/','distrito_id'=>358));
            // DB::table('direcciones')->insert(array('id'=>94,'avenida_calle'=>'C/Concepcion','numero_domicilio'=>504,'barrio_zona'=>'B/','distrito_id'=>359));
            // DB::table('direcciones')->insert(array('id'=>95,'avenida_calle'=>'C/1','numero_domicilio'=>830,'barrio_zona'=>'B/','distrito_id'=>367));
            // DB::table('direcciones')->insert(array('id'=>96,'avenida_calle'=>'C/Litoral','numero_domicilio'=>550,'barrio_zona'=>'B/','distrito_id'=>370));
            // DB::table('direcciones')->insert(array('id'=>97,'avenida_calle'=>'C/10','numero_domicilio'=>22,'barrio_zona'=>'B/','distrito_id'=>375));
            // DB::table('direcciones')->insert(array('id'=>98,'avenida_calle'=>'C/San Lomerio','numero_domicilio'=>663,'barrio_zona'=>'B/','distrito_id'=>380));
            // DB::table('direcciones')->insert(array('id'=>99,'avenida_calle'=>'C/Litoral','numero_domicilio'=>777,'barrio_zona'=>'B/','distrito_id'=>388));
            // DB::table('direcciones')->insert(array('id'=>100,'avenida_calle'=>'C/San Julian','numero_domicilio'=>888,'barrio_zona'=>'B/','distrito_id'=>389));
            // DB::table('direcciones')->insert(array('id'=>101,'avenida_calle'=>'C/31 de agoosto','numero_domicilio'=>999,'barrio_zona'=>'B/','distrito_id'=>400));
            // DB::table('direcciones')->insert(array('id'=>102,'avenida_calle'=>'C/San Xavier','numero_domicilio'=>777,'barrio_zona'=>'B/','distrito_id'=>409));
            // DB::table('direcciones')->insert(array('id'=>103,'avenida_calle'=>'C/Saveedra','numero_domicilio'=>702,'barrio_zona'=>'B/','distrito_id'=>419));
            // DB::table('direcciones')->insert(array('id'=>104,'avenida_calle'=>'C/San','numero_domicilio'=>902,'barrio_zona'=>'B/','distrito_id'=>425));
            // DB::table('direcciones')->insert(array('id'=>105,'avenida_calle'=>'C/Fernandez','numero_domicilio'=>400,'barrio_zona'=>'B/','distrito_id'=>429));
            // DB::table('direcciones')->insert(array('id'=>106,'avenida_calle'=>'C/San Pedro','numero_domicilio'=>88,'barrio_zona'=>'B/','distrito_id'=>439));
            // DB::table('direcciones')->insert(array('id'=>107,'avenida_calle'=>'C/Guadalupe','numero_domicilio'=>199,'barrio_zona'=>'B/','distrito_id'=>449));
            // DB::table('direcciones')->insert(array('id'=>108,'avenida_calle'=>'C/Belgica','numero_domicilio'=>1009,'barrio_zona'=>'B/','distrito_id'=>459));
            // DB::table('direcciones')->insert(array('id'=>109,'avenida_calle'=>'C/Sara','numero_domicilio'=>2333,'barrio_zona'=>'B/','distrito_id'=>469));
            // DB::table('direcciones')->insert(array('id'=>110,'avenida_calle'=>'C/Moro','numero_domicilio'=>440,'barrio_zona'=>'B/','distrito_id'=>480));
            // DB::table('direcciones')->insert(array('id'=>111,'avenida_calle'=>'C/surubi','numero_domicilio'=>330,'barrio_zona'=>'B/','distrito_id'=>498));
            // DB::table('direcciones')->insert(array('id'=>112,'avenida_calle'=>'C/trigal','numero_domicilio'=>220,'barrio_zona'=>'B/','distrito_id'=>504));
            // DB::table('direcciones')->insert(array('id'=>113,'avenida_calle'=>'C/23 de julio','numero_domicilio'=>110,'barrio_zona'=>'B/','distrito_id'=>517));
            // DB::table('direcciones')->insert(array('id'=>114,'avenida_calle'=>'C/1 de agosto','numero_domicilio'=>93,'barrio_zona'=>'B/','distrito_id'=>519));
            // DB::table('direcciones')->insert(array('id'=>115,'avenida_calle'=>'C/imperil','numero_domicilio'=>34,'barrio_zona'=>'B/','distrito_id'=>529));
            // DB::table('direcciones')->insert(array('id'=>116,'avenida_calle'=>'C/Cahragua','numero_domicilio'=>654,'barrio_zona'=>'B/','distrito_id'=>536));

            
        // Fin de las direcciones de hospitales



        
        // 117 iniciar
        // 1-20
            // DB::table('direcciones')->insert(array('id'=>117,'avenida_calle'=>'C/7','numero_domicilio'=>123,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>118,'avenida_calle'=>'C/4','numero_domicilio'=>133,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>119,'avenida_calle'=>'C/5','numero_domicilio'=>144,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>120,'avenida_calle'=>'C/6','numero_domicilio'=>155,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>121,'avenida_calle'=>'C/7','numero_domicilio'=>166,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>122,'avenida_calle'=>'C/8','numero_domicilio'=>199,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>123,'avenida_calle'=>'C/10','numero_domicilio'=>200,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>124,'avenida_calle'=>'C/2','numero_domicilio'=>201,'barrio_zona'=>'B/Cotoca','distrito_id'=>1));
            // DB::table('direcciones')->insert(array('id'=>125,'avenida_calle'=>'Warnes','numero_domicilio'=>233,'barrio_zona'=>'Norte','distrito_id'=>2));
            // DB::table('direcciones')->insert(array('id'=>126,'avenida_calle'=>'Bolivar','numero_domicilio'=>234,'barrio_zona'=>'B/Venezuela','distrito_id'=>3));
            // DB::table('direcciones')->insert(array('id'=>127,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>4545,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>128,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>445,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>129,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>6545,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>130,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>7545,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>131,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>8545,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>132,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>9545,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>133,'avenida_calle'=>'Santa Cruz','numero_domicilio'=>1545,'barrio_zona'=>'Norte','distrito_id'=>4));
            // DB::table('direcciones')->insert(array('id'=>134,'avenida_calle'=>'Av Melchor','numero_domicilio'=>667,'barrio_zona'=>'1er anillo','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>135,'avenida_calle'=>'Av Guarani','numero_domicilio'=>561,'barrio_zona'=>'Sur km/2','distrito_id'=>6));
            // DB::table('direcciones')->insert(array('id'=>136,'avenida_calle'=>'C/Independiente','numero_domicilio'=>123,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>137,'avenida_calle'=>'C/Independiente','numero_domicilio'=>323,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>138,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4203,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>139,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4243,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>140,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4263,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>141,'avenida_calle'=>'C/Independiente','numero_domicilio'=>2263,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>142,'avenida_calle'=>'C/Independiente','numero_domicilio'=>1273,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>143,'avenida_calle'=>'C/Independiente','numero_domicilio'=>2423,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>144,'avenida_calle'=>'C/Independiente','numero_domicilio'=>3243,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>145,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4423,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>146,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4523,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>147,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4623,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>148,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4823,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>149,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4293,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>150,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4230,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>151,'avenida_calle'=>'C/Independiente','numero_domicilio'=>4231,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>152,'avenida_calle'=>'C/Independiente','numero_domicilio'=>553,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>153,'avenida_calle'=>'C/Independiente','numero_domicilio'=>5773,'barrio_zona'=>'Norte 2do anillo','distrito_id'=>7));
            // DB::table('direcciones')->insert(array('id'=>154,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>331,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>155,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>321,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>156,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>351,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>157,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>300,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>158,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>346,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>159,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>333,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>160,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>390,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>161,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>381,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>162,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>433,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>163,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>432,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>164,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>421,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>165,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>420,'barrio_zona'=>'','distrito_id'=>5));
            // DB::table('direcciones')->insert(array('id'=>166,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>155,'barrio_zona'=>'','distrito_id'=>5));
        //

        



        // Provincia Andres Ibañez //municipio Cotoca   //distrito 21 al 35                 Registros#10
        // DB::table('direcciones')->insert(array('id'=>167,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>455,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>168,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>555,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>169,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>505,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>170,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>503,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>171,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>500,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>172,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>501,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>173,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>502,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>174,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>503,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>175,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>504,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>176,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>505,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>177,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>506,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>178,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>507,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>179,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>508,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>180,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>509,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>181,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>510,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>182,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>511,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>183,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>513,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>184,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>541,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>185,'avenida_calle'=>'Calle Quijarro','numero_domicilio'=>551,'barrio_zona'=>'','distrito_id'=>21));
        // DB::table('direcciones')->insert(array('id'=>186,'avenida_calle'=>'Calle Quijaro','numero_domicilio'=>453,'barrio_zona'=>'','distrito_id'=>22));
        // DB::table('direcciones')->insert(array('id'=>187,'avenida_calle'=>'Calle Puerto Alonso','numero_domicilio'=>121,'barrio_zona'=>'','distrito_id'=>23));
        // DB::table('direcciones')->insert(array('id'=>188,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>234,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>189,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>122,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>190,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>126,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>191,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>127,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>192,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>129,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>193,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>130,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>194,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>234,'barrio_zona'=>'','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>195,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>167,'barrio_zona'=>'Norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>196,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>98,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>197,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>766,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>198,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3440,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>199,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3440,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>200,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3540,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>201,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3640,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>202,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3480,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>203,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3490,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>204,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3240,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>205,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3910,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>206,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3210,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>207,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3450,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>208,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3980,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>209,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3000,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>210,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3010,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>211,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>3030,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>212,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>443,'barrio_zona'=>'norte','distrito_id'=>24));
        // DB::table('direcciones')->insert(array('id'=>213,'avenida_calle'=>'Calle Porongo','numero_domicilio'=>432,'barrio_zona'=>'norte','distrito_id'=>24));



  
       



        //Direcciones de Medicos


        //Direcciones de Pacientes
        // Provincia Andres Ibañez //municipio Santa cruz de la sierra    //distrito del 1 al 20       Registros# 10
       
       




















        
       


        // La guardia  distrito del 43 al 56
            // DB::table('direcciones')->insert(array('id'=>214,'avenida_calle'=>'Calle Piso Firme','numero_domicilio'=>444,'barrio_zona'=>'B/Madrid','distrito_id'=>43));
            // DB::table('direcciones')->insert(array('id'=>215,'avenida_calle'=>'Calle Peji','numero_domicilio'=>123,'barrio_zona'=>'B Cruz','distrito_id'=>44));
            // DB::table('direcciones')->insert(array('id'=>216,'avenida_calle'=>'Enconada','numero_domicilio'=>234,'barrio_zona'=>'B/Urkupiña','distrito_id'=>45));
            // DB::table('direcciones')->insert(array('id'=>217,'avenida_calle'=>'Calle Urina','numero_domicilio'=>556,'barrio_zona'=>'Z/Norte','distrito_id'=>46));
            // DB::table('direcciones')->insert(array('id'=>218,'avenida_calle'=>'Choreti','numero_domicilio'=>789,'barrio_zona'=>'B/Ramada','distrito_id'=>44));
            // DB::table('direcciones')->insert(array('id'=>219,'avenida_calle'=>'Chochís','numero_domicilio'=>252,'barrio_zona'=>'B/San Antonio','distrito_id'=>46));
            // DB::table('direcciones')->insert(array('id'=>220,'avenida_calle'=>'Chochís','numero_domicilio'=>112,'barrio_zona'=>'B/Bolivar','distrito_id'=>46));
            // DB::table('direcciones')->insert(array('id'=>221,'avenida_calle'=>'Chochís','numero_domicilio'=>299,'barrio_zona'=>'B/Melchor','distrito_id'=>46));
            // DB::table('direcciones')->insert(array('id'=>222,'avenida_calle'=>'Chochís','numero_domicilio'=>200,'barrio_zona'=>'B/Mangales','distrito_id'=>46));
            // DB::table('direcciones')->insert(array('id'=>223,'avenida_calle'=>'Chochís','numero_domicilio'=>932,'barrio_zona'=>'norte','distrito_id'=>46));
            // DB::table('direcciones')->insert(array('id'=>224,'avenida_calle'=>'Calle Usuri','numero_domicilio'=>344,'barrio_zona'=>'','distrito_id'=>48));
            // DB::table('direcciones')->insert(array('id'=>225,'avenida_calle'=>'Calle Urucú','numero_domicilio'=>443,'barrio_zona'=>'','distrito_id'=>49));
            // DB::table('direcciones')->insert(array('id'=>226,'avenida_calle'=>'La Higuera','numero_domicilio'=>123,'barrio_zona'=>'','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>227,'avenida_calle'=>'Calle Universo','numero_domicilio'=>337,'barrio_zona'=>'','distrito_id'=>53));
            // DB::table('direcciones')->insert(array('id'=>228,'avenida_calle'=>'Calle Turuguapa','numero_domicilio'=>655,'barrio_zona'=>'','distrito_id'=>53));
            // DB::table('direcciones')->insert(array('id'=>229,'avenida_calle'=>'Calle Tulipanes','numero_domicilio'=>433,'barrio_zona'=>'','distrito_id'=>52));
            // DB::table('direcciones')->insert(array('id'=>230,'avenida_calle'=>'Calle Tucan','numero_domicilio'=>891,'barrio_zona'=>'','distrito_id'=>52));
            // DB::table('direcciones')->insert(array('id'=>231,'avenida_calle'=>'Calle Tarbo','numero_domicilio'=>901,'barrio_zona'=>'','distrito_id'=>52));
            // DB::table('direcciones')->insert(array('id'=>232,'avenida_calle'=>'Calle Sumuqué','numero_domicilio'=>265,'barrio_zona'=>'','distrito_id'=>51));




        // San Matías del 54 al 61
            // DB::table('direcciones')->insert(array('id'=>233,'avenida_calle'=>'Calle Sucre','numero_domicilio'=>344,'barrio_zona'=>'1er anillo','distrito_id'=>49));
            // DB::table('direcciones')->insert(array('id'=>234,'avenida_calle'=>'Calle Stig Ryden','numero_domicilio'=>555,'barrio_zona'=>'1er anillo','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>235,'avenida_calle'=>'Calle Severo Vásquez Machicado','numero_domicilio'=>767,'barrio_zona'=>'1er anillo','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>236,'avenida_calle'=>'Calle Serere','numero_domicilio'=>767,'barrio_zona'=>'1er anillo','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>237,'avenida_calle'=>'Calle Senda','numero_domicilio'=>323,'barrio_zona'=>'3er anillo','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>238,'avenida_calle'=>'Calle Saturnino Saucedo','numero_domicilio'=>322,'barrio_zona'=>'1er anillo','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>239,'avenida_calle'=>'Calle Sara','numero_domicilio'=>767,'barrio_zona'=>'1er anillo','distrito_id'=>61));
            // DB::table('direcciones')->insert(array('id'=>240,'avenida_calle'=>'Calle Santiago Ortiz','numero_domicilio'=>344,'barrio_zona'=>'3er anillo','distrito_id'=>60));
            // DB::table('direcciones')->insert(array('id'=>241,'avenida_calle'=>'Calle Santa Rosa De Lima','numero_domicilio'=>443,'barrio_zona'=>'1er anillo','distrito_id'=>52));
            // DB::table('direcciones')->insert(array('id'=>242,'avenida_calle'=>'Calle Santa Barbara','numero_domicilio'=>787,'barrio_zona'=>'3er anillo','distrito_id'=>53));
        
        
        
            // DB::table('direcciones')->insert(array('id'=>243,'avenida_calle'=>'Calle Sandia','numero_domicilio'=>109,'barrio_zona'=>'1er anillo','distrito_id'=>54));
            // DB::table('direcciones')->insert(array('id'=>244,'avenida_calle'=>'Calle San Pablo','numero_domicilio'=>105,'barrio_zona'=>'Km 4','distrito_id'=>54));
            // DB::table('direcciones')->insert(array('id'=>245,'avenida_calle'=>'Calle San Luis De Cáceres','numero_domicilio'=>43,'barrio_zona'=>'1er anillo','distrito_id'=>55));
            // DB::table('direcciones')->insert(array('id'=>246,'avenida_calle'=>'Calle San Juan De Chacarilla','numero_domicilio'=>126,'barrio_zona'=>'1er anillo','distrito_id'=>57));
            // DB::table('direcciones')->insert(array('id'=>247,'avenida_calle'=>'Calle San Jorge','numero_domicilio'=>566,'barrio_zona'=>'Norte','distrito_id'=>58));
            // DB::table('direcciones')->insert(array('id'=>248,'avenida_calle'=>'Calle San Javier','numero_domicilio'=>322,'barrio_zona'=>'1er anillo','distrito_id'=>58));
            // DB::table('direcciones')->insert(array('id'=>249,'avenida_calle'=>'Calle San German','numero_domicilio'=>902,'barrio_zona'=>'1er anillo','distrito_id'=>59));
            // DB::table('direcciones')->insert(array('id'=>250,'avenida_calle'=>'Calle Río Purús','numero_domicilio'=>566,'barrio_zona'=>'1er anillo','distrito_id'=>60));
            // DB::table('direcciones')->insert(array('id'=>251,'avenida_calle'=>'Calle Río Mataracú','numero_domicilio'=>401,'barrio_zona'=>'1er anillo','distrito_id'=>49));
            // DB::table('direcciones')->insert(array('id'=>252,'avenida_calle'=>'Calle Río Jipa','numero_domicilio'=>655,'barrio_zona'=>'1er anillo','distrito_id'=>50));

            // DB::table('direcciones')->insert(array('id'=>253,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4543,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>254,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4543,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>255,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4545,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>256,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4545,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>257,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4549,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>258,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4449,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>259,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4049,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>260,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4849,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>261,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4549,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>262,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>4549,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>263,'avenida_calle'=>'Calle Río Cuchi','numero_domicilio'=>1229,'barrio_zona'=>'norte','distrito_id'=>50));
            // DB::table('direcciones')->insert(array('id'=>264,'avenida_calle'=>'Calle Río Chontal','numero_domicilio'=>2934,'barrio_zona'=>'norte','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>265,'avenida_calle'=>'Calle Rurrenabaque','numero_domicilio'=>9222,'barrio_zona'=>'norte','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>266,'avenida_calle'=>'Calle Reyes Cardona','numero_domicilio'=>5733,'barrio_zona'=>'norte','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>267,'avenida_calle'=>'Calle Republiquetas','numero_domicilio'=>7637,'barrio_zona'=>'norte','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>268,'avenida_calle'=>'Calle Republiquetas','numero_domicilio'=>3223,'barrio_zona'=>'norte','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>269,'avenida_calle'=>'Calle Republiquetas','numero_domicilio'=>1222,'barrio_zona'=>'norte','distrito_id'=>51));
            // DB::table('direcciones')->insert(array('id'=>270,'avenida_calle'=>'Calle René Moreno','numero_domicilio'=>873,'barrio_zona'=>'norte','distrito_id'=>52));
            // DB::table('direcciones')->insert(array('id'=>271,'avenida_calle'=>'Calle Regimiento Lanza','numero_domicilio'=>332,'barrio_zona'=>'norte','distrito_id'=>51));


            // San José de Chiquitos    62  al  76

            // DB::table('direcciones')->insert(array('id'=>272,'avenida_calle'=>'Calle Regimiento 24','numero_domicilio'=>332,'barrio_zona'=>'sur','distrito_id'=>62));
            // DB::table('direcciones')->insert(array('id'=>273,'avenida_calle'=>'Calle Raquel Becerra De Busch','numero_domicilio'=>333,'barrio_zona'=>'sur','distrito_id'=>63));
            // DB::table('direcciones')->insert(array('id'=>274,'avenida_calle'=>'Calle Ramón Clouzet','numero_domicilio'=>230,'barrio_zona'=>'sur','distrito_id'=>64));
            // DB::table('direcciones')->insert(array('id'=>275,'avenida_calle'=>'Calle Rafael Peña','numero_domicilio'=>2021,'barrio_zona'=>'norte','distrito_id'=>65));
            // DB::table('direcciones')->insert(array('id'=>276,'avenida_calle'=>'Calle Quitachiyú','numero_domicilio'=>662,'barrio_zona'=>'norte','distrito_id'=>66));
            // DB::table('direcciones')->insert(array('id'=>277,'avenida_calle'=>'Calle Quimorí','numero_domicilio'=>342,'barrio_zona'=>'norte','distrito_id'=>67));
            // DB::table('direcciones')->insert(array('id'=>278,'avenida_calle'=>'Ichilo','numero_domicilio'=>998,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>279,'avenida_calle'=>'Ichilo','numero_domicilio'=>1998,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>280,'avenida_calle'=>'Ichilo','numero_domicilio'=>2998,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>281,'avenida_calle'=>'Ichilo','numero_domicilio'=>3998,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>282,'avenida_calle'=>'Ichilo','numero_domicilio'=>958,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>283,'avenida_calle'=>'Ichilo','numero_domicilio'=>978,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>284,'avenida_calle'=>'Ichilo','numero_domicilio'=>998,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>285,'avenida_calle'=>'Ichilo','numero_domicilio'=>987,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>286,'avenida_calle'=>'Ichilo','numero_domicilio'=>898,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>287,'avenida_calle'=>'Ichilo','numero_domicilio'=>798,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>288,'avenida_calle'=>'Ichilo','numero_domicilio'=>198,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>289,'avenida_calle'=>'Ichilo','numero_domicilio'=>498,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>290,'avenida_calle'=>'Hugo Wast (5 Este)','numero_domicilio'=>642,'barrio_zona'=>'1er anillo','distrito_id'=>68));
            // DB::table('direcciones')->insert(array('id'=>291,'avenida_calle'=>'Horcones','numero_domicilio'=>2002,'barrio_zona'=>'1er anillo','distrito_id'=>69));
            // DB::table('direcciones')->insert(array('id'=>292,'avenida_calle'=>'Hebreos','numero_domicilio'=>656,'barrio_zona'=>'Z/A Km4','distrito_id'=>70));

            // DB::table('direcciones')->insert(array('id'=>293,'avenida_calle'=>'Hardeman','numero_domicilio'=>454,'barrio_zona'=>'Z/A Km4','distrito_id'=>71));
            // DB::table('direcciones')->insert(array('id'=>294,'avenida_calle'=>'Gálatas','numero_domicilio'=>102,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>295,'avenida_calle'=>'Gálatas','numero_domicilio'=>172,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>296,'avenida_calle'=>'Gálatas','numero_domicilio'=>142,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>297,'avenida_calle'=>'Gálatas','numero_domicilio'=>132,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>298,'avenida_calle'=>'Gálatas','numero_domicilio'=>102,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>299,'avenida_calle'=>'Gálatas','numero_domicilio'=>152,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>300,'avenida_calle'=>'Gálatas','numero_domicilio'=>192,'barrio_zona'=>'Z/A Km4','distrito_id'=>72));
            // DB::table('direcciones')->insert(array('id'=>301,'avenida_calle'=>'Guerra Del Acre','numero_domicilio'=>24,'barrio_zona'=>'Z/A Km4','distrito_id'=>73));
            // DB::table('direcciones')->insert(array('id'=>302,'avenida_calle'=>'Guarayos','numero_domicilio'=>676,'barrio_zona'=>'Z/A Km4','distrito_id'=>74));
            // DB::table('direcciones')->insert(array('id'=>303,'avenida_calle'=>'Guarayos','numero_domicilio'=>600,'barrio_zona'=>'Z/A Km4','distrito_id'=>74));
            // DB::table('direcciones')->insert(array('id'=>304,'avenida_calle'=>'Guarayos','numero_domicilio'=>602,'barrio_zona'=>'Z/A Km4','distrito_id'=>74));
            // DB::table('direcciones')->insert(array('id'=>305,'avenida_calle'=>'Guarayos','numero_domicilio'=>666,'barrio_zona'=>'Z/A Km4','distrito_id'=>74));
            // DB::table('direcciones')->insert(array('id'=>306,'avenida_calle'=>'Guarayos','numero_domicilio'=>601,'barrio_zona'=>'Z/A Km4','distrito_id'=>74));




        

        // Pailón
        // Roboré

        // Lagunillas
        // Boyuibe
        // Cabezas

        // Camiri
        // Charagua
        // Cuevo                
        // Gutfiérrez
        // Samaipata
        // Mairana
        // Pampa grande
        // Quirusillas

        // Puerto Suárez
        // Carmen Rivero
        // Puerto Quijarro

        // Ascensión de Guarayos
        // El puente
        // Urubichá

        // Buena vista
        // San Carlos
        // Yapacani
        // San Juan de Yapacaní


        // San Ignacio de Velasco
        // San Miguel de Velasco
        // San Rafael de Velasco

        // Comarapa

        // Saipina
        // 10Concepción

        // Cuatro Cañadas

        // San Antonio del Lomerío

        // San Julián

        // San Ramón

        // San Xavier
        // 11General Agustín Saavedra

        // Montero

        // Minero

        // Fernández Alonso

        // San Pedro


        // Portachuelo

        // Colpa Bélgica

        // Santa Rosa del Sara


        // Moro Moro

        // Ballegrande

        // el Trigal

        // Postrervalle

        // Cupará


        // Warnes

        // Okinawa








    }
    // Link de calles 
    // https://moovitapp.com/index/es-419/transporte_p%C3%BAblico-streets-Santa_Cruz_de_la_Sierra-2-4977

    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
