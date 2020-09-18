<?php
use Illuminate\Support\Facades\DB;

        //1- 1-20    Santa Cruz     Direcciones de hospitales

            //  --1 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Mexico','numero_domicilio'=>455,'barrio_zona'=>'1er Anillo','distrito_id'=>1));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Melchor Pinto','numero_domicilio'=>654,'barrio_zona'=>'Norte','distrito_id'=>2));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Independencia','numero_domicilio'=>1230,'barrio_zona'=>'Av circunvalacion','distrito_id'=>10));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Warnes','numero_domicilio'=>1443,'barrio_zona'=>'Sur','distrito_id'=>11));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Meneses','numero_domicilio'=>4123,'barrio_zona'=>'Z/norte','distrito_id'=>3));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Santa Cruz','numero_domicilio'=>5652,'barrio_zona'=>'Z/norte','distrito_id'=>4));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Montero','numero_domicilio'=>233,'barrio_zona'=>'Z/norte','distrito_id'=>5));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/ Monte Carlo','numero_domicilio'=>900,'barrio_zona'=>'Z/norte','distrito_id'=>4));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Edita Arias','numero_domicilio'=>322,'barrio_zona'=>'Z/norte','distrito_id'=>7));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Colombia','numero_domicilio'=>766,'barrio_zona'=>'Z/norte','distrito_id'=>19));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Manchego','numero_domicilio'=>122,'barrio_zona'=>'Z/norte','distrito_id'=>20));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Cochabamba','numero_domicilio'=>777,'barrio_zona'=>'Z/norte','distrito_id'=>18));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. La Paz','numero_domicilio'=>544,'barrio_zona'=>'Z/norte','distrito_id'=>17));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/ Daniel Ribero','numero_domicilio'=>1022,'barrio_zona'=>'Z/norte','distrito_id'=>16));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. 3 pasos al frente','numero_domicilio'=>765,'barrio_zona'=>'Z/norte','distrito_id'=>15));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Caiman','numero_domicilio'=>332,'barrio_zona'=>'Z/norte','distrito_id'=>11));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Norte','numero_domicilio'=>101,'barrio_zona'=>'Z/norte','distrito_id'=>12));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Pirai','numero_domicilio'=>1022,'barrio_zona'=>'Z/norte','distrito_id'=>14));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Ballegrander','numero_domicilio'=>435,'barrio_zona'=>'Z/norte','distrito_id'=>5));
                DB::table('direcciones')->insert(array('avenida_calle'=>'Av. Cristo','numero_domicilio'=>101,'barrio_zona'=>'Z/norte','distrito_id'=>8));
            // --20

            // hospitales  de santa cruz

                DB::table('hospitales')->insert(array('nombre'=>'Hospital General I','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>1));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Japones','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>2));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Niños','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>3));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Aleman','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>4));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Obrero I','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>5));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital  Mexicano','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>6));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Santa Cruz','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>7));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Obrero II ','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>8));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>9));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Japones II','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>10));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General II','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>11));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Jesucristo','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>12));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General III','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>13));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital  Obispo Santiteban','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>14));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Warnes ','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>15));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Evo Morales','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>16));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital San jose','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>17));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Frances','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>18));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Montero','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>19));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'60368599','direccion_id'=>20));

            //
        //


        //2- 21-35    Cotoca   
        
            //  -- 21 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Santa cruz','numero_domicilio'=>322,'barrio_zona'=>'Central','distrito_id'=>21));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Central','numero_domicilio'=>322,'barrio_zona'=>'Z/norte','distrito_id'=>22));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/5','numero_domicilio'=>322,'barrio_zona'=>'Z/Sur','distrito_id'=>23));
            //  -- 23
            
            
            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Cotoca','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>21));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'cuarto','telefono'=>'77368599','direccion_id'=>23));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Niño','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368599','direccion_id'=>23));
            //
        //

        //3- 36-42    Torno
        
            // --24 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Florida','numero_domicilio'=>522,'barrio_zona'=>'Central','distrito_id'=>21));
            // --24

            // hospitales
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Torno','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'60168519','direccion_id'=>24));
            //
        //
        
        //4- 43-56      Guardia
            // --25 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/La paz','numero_domicilio'=>662,'barrio_zona'=>'B/Cotoca','distrito_id'=>44));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Cañoto','numero_domicilio'=>442,'barrio_zona'=>'Z/norte','distrito_id'=>56));
            // --26

            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de la guardia','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368339','direccion_id'=>25));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368339','direccion_id'=>26));
            //
        // 














        //5- 57-61      Porongo
            // --27 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Edita Arias','numero_domicilio'=>442,'barrio_zona'=>'B/Venezuela','distrito_id'=>57));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Batalla del Pari','numero_domicilio'=>662,'barrio_zona'=>'B/San jose','distrito_id'=>58));
            // --28

            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Porongo','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368339','direccion_id'=>27));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'77364339','direccion_id'=>28));
            //
        //


        //6- 62-72      San Matías
            // --29 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Cidral','numero_domicilio'=>653,'barrio_zona'=>'B/San Juan','distrito_id'=>62));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/San Matias','numero_domicilio'=>660,'barrio_zona'=>'B/San San Matias','distrito_id'=>72));
            // --30

            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Porongo','imagen'=>'imagenes/hospital.jpg','nivel'=>'tercer','telefono'=>'77368339','direccion_id'=>29));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'77364339','direccion_id'=>30));
            //
        //


        //7- 73-81      San José de Chiquitos
            // --31 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>110,'barrio_zona'=>'B/','distrito_id'=>73));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/San jose','numero_domicilio'=>640,'barrio_zona'=>'B/','distrito_id'=>74));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Santa Xruz','numero_domicilio'=>360,'barrio_zona'=>'B/','distrito_id'=>78));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/7','numero_domicilio'=>760,'barrio_zona'=>'B/','distrito_id'=>80));
            // --34

            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General San Jose','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>'77368339','direccion_id'=>31));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital San Julian','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'61064339','direccion_id'=>32));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital San Rafael','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'77610339','direccion_id'=>33));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'77377771','direccion_id'=>34));
            //
        //

        //8- 82-91      Pailón
            // --35 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>110,'barrio_zona'=>'B/Villa Real','distrito_id'=>82));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/San Ramon','numero_domicilio'=>640,'barrio_zona'=>'B/Urkupiña','distrito_id'=>84));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/San Jose','numero_domicilio'=>360,'barrio_zona'=>'B/Chino','distrito_id'=>91));
            // --37

            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Pailon','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>'77368339','direccion_id'=>35));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'61064339','direccion_id'=>36));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'77610339','direccion_id'=>37));
            //
        //
        
        //9- 92-100     Robore
            // --38 direcciones
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Nacional','numero_domicilio'=>1110,'barrio_zona'=>'B/','distrito_id'=>92));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1640,'barrio_zona'=>'B/Argentino','distrito_id'=>97));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Guayaba','numero_domicilio'=>1360,'barrio_zona'=>'B/Fernandez','distrito_id'=>100));
            // --40

            // hospitales 
                DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Pailon','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>'56657673','direccion_id'=>38));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'653656235','direccion_id'=>39));
                DB::table('hospitales')->insert(array('nombre'=>'Hospital Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'60098298','direccion_id'=>40));
            //
        //

        //10- 101-111   Lagunillas
                // --38 direcciones
                    DB::table('direcciones')->insert(array('avenida_calle'=>'C/Nacional','numero_domicilio'=>1110,'barrio_zona'=>'B/','distrito_id'=>92));
                    DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1640,'barrio_zona'=>'B/Argentino','distrito_id'=>97));
                    DB::table('direcciones')->insert(array('avenida_calle'=>'C/Guayaba','numero_domicilio'=>1360,'barrio_zona'=>'B/Fernandez','distrito_id'=>100));
                // --40

                // hospitales 
                    DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Pailon','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>'56657673','direccion_id'=>38));
                    DB::table('hospitales')->insert(array('nombre'=>'Hospital San Juan de Dios','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'653656235','direccion_id'=>39));
                    DB::table('hospitales')->insert(array('nombre'=>'Hospital Nacional','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'60098298','direccion_id'=>40));
                //

        //

        //43- 429-438   Montero
                // --38 direcciones
                    DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>810,'barrio_zona'=>'B/','distrito_id'=>429));
                    DB::table('direcciones')->insert(array('avenida_calle'=>'C/5','numero_domicilio'=>10,'barrio_zona'=>'B/Guadalupe','distrito_id'=>430));
                    DB::table('direcciones')->insert(array('avenida_calle'=>'C/Warnes','numero_domicilio'=>150,'barrio_zona'=>'B/Fernandez','distrito_id'=>438));
                // --40

                // hospitales 
                    DB::table('hospitales')->insert(array('nombre'=>'Hospital General de Montero','imagen'=>'imagenes/hospital.jpg','nivel'=>'primer','telefono'=>'65635635','direccion_id'=>41));
                    DB::table('hospitales')->insert(array('nombre'=>'Hospital Obrero','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'78278271','direccion_id'=>42));
                    DB::table('hospitales')->insert(array('nombre'=>'Hospital Dr.','imagen'=>'imagenes/hospital.jpg','nivel'=>'quinto','telefono'=>'656810100','direccion_id'=>43));
                //
        //
        //44- 439-448   Minero 








                
        // }
        //11- 112-122   Boyuibe
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>710,'barrio_zona'=>'B/','distrito_id'=>112));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>711,'barrio_zona'=>'B/','distrito_id'=>122));
        //12- 123-132   Cabezas
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>713,'barrio_zona'=>'B/','distrito_id'=>123));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>453,'barrio_zona'=>'B/','distrito_id'=>132));
        //13- 133-139   Camiri
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>566,'barrio_zona'=>'B/','distrito_id'=>134));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>710,'barrio_zona'=>'B/','distrito_id'=>138));

        //14- 140-149   Charagua
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>892,'barrio_zona'=>'B/','distrito_id'=>141));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>7676,'barrio_zona'=>'B/','distrito_id'=>145));
        
        //15- 150-159   Cuevo
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>322,'barrio_zona'=>'B/','distrito_id'=>151));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>988,'barrio_zona'=>'B/','distrito_id'=>156));
        
        //16- 160-169   Guitierrez
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>543,'barrio_zona'=>'B/','distrito_id'=>163));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1001,'barrio_zona'=>'B/','distrito_id'=>168));
        
        //17- 170-179   Samaipata
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1002,'barrio_zona'=>'B/','distrito_id'=>170));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>866,'barrio_zona'=>'B/','distrito_id'=>173));
        
        //18- 180-198   Mairana
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>455,'barrio_zona'=>'B/','distrito_id'=>184));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>554,'barrio_zona'=>'B/','distrito_id'=>188));
        
        //19- 199-208   Pampa grande
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>133,'barrio_zona'=>'B/','distrito_id'=>199));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>110,'barrio_zona'=>'B/','distrito_id'=>206));
        
        //20- 209-208   Quirusillas
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>820,'barrio_zona'=>'B/','distrito_id'=>209));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>813,'barrio_zona'=>'B/','distrito_id'=>217));
        
        //21- 219-228   Puerto Suárez
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>988,'barrio_zona'=>'B/','distrito_id'=>219));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>766,'barrio_zona'=>'B/','distrito_id'=>227));
        
        //23- 229-238   Puerto Quijarro
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>120,'barrio_zona'=>'B/','distrito_id'=>229));
        
        //24- 239-248   Ascensión de Guarayos
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>123,'barrio_zona'=>'B/','distrito_id'=>242));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>345,'barrio_zona'=>'B/','distrito_id'=>247));
        
        //25- 249-258   El puente
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>655,'barrio_zona'=>'B/','distrito_id'=>250));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>710,'barrio_zona'=>'B/','distrito_id'=>256));
        // 443
        //26- 259-268   Urubichá
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>598,'barrio_zona'=>'B/','distrito_id'=>269));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>433,'barrio_zona'=>'B/','distrito_id'=>278));
        
        //27- 269-278   Buena vista
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>540,'barrio_zona'=>'B/','distrito_id'=>270));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>534,'barrio_zona'=>'B/','distrito_id'=>275));
        
        //28- 279-288   San Carlos
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>611,'barrio_zona'=>'B/','distrito_id'=>279));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>100,'barrio_zona'=>'B/','distrito_id'=>286));
        
        //29- 289-298   Yapacani
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1006,'barrio_zona'=>'B/','distrito_id'=>299));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>310,'barrio_zona'=>'B/','distrito_id'=>307));
        
        //30- 299-308   San Juan de Yapacaní
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>410,'barrio_zona'=>'B/','distrito_id'=>307));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1810,'barrio_zona'=>'B/','distrito_id'=>308));
        
        //31- 209-318   San Ignacio de Velasco
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>850,'barrio_zona'=>'B/','distrito_id'=>319));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>990,'barrio_zona'=>'B/','distrito_id'=>317));
        
        //32- 319-328   San Miguel de Velasco
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>800,'barrio_zona'=>'B/','distrito_id'=>319));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>565,'barrio_zona'=>'B/','distrito_id'=>326));
        
        //33- 329-338   San Rafael de Velasco
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>8878,'barrio_zona'=>'B/','distrito_id'=>380));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>654,'barrio_zona'=>'B/','distrito_id'=>380));
        
        //34- 339-348   Comarapa
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>106,'barrio_zona'=>'B/','distrito_id'=>339));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>811,'barrio_zona'=>'B/','distrito_id'=>348));
        
        //35- 349-358   Saipina
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>702,'barrio_zona'=>'B/','distrito_id'=>349));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1010,'barrio_zona'=>'B/','distrito_id'=>358));
        
        //36- 359-368   Concepción
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>504,'barrio_zona'=>'B/','distrito_id'=>359));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>830,'barrio_zona'=>'B/','distrito_id'=>367));
        
        //37- 369-378   Cuatro Cañadas
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>550,'barrio_zona'=>'B/','distrito_id'=>370));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>22,'barrio_zona'=>'B/','distrito_id'=>375));
        
        //38- 379-388   San Antonio del Lomerío
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>663,'barrio_zona'=>'B/','distrito_id'=>380));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>777,'barrio_zona'=>'B/','distrito_id'=>388));
        
        //39- 389-398   San Julián
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>888,'barrio_zona'=>'B/','distrito_id'=>389));
        
        //40- 399-408   San Ramon
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>999,'barrio_zona'=>'B/','distrito_id'=>400));
        
        //41- 409-418   San Xavier
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>777,'barrio_zona'=>'B/','distrito_id'=>409));
        
        //42- 419-428   General Agustín Saavedra
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>702,'barrio_zona'=>'B/','distrito_id'=>419));
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>902,'barrio_zona'=>'B/','distrito_id'=>425));
                
        //45- 429-438   Fernandez Alonso
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>400,'barrio_zona'=>'B/','distrito_id'=>429));
        
        //46- 439-448   San Pedro
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>88,'barrio_zona'=>'B/','distrito_id'=>439));
        
        //47- 449-458   Portachuelo
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>19,'barrio_zona'=>'B/','distrito_id'=>449));
        
        //48- 459-468   Colpa Belgica
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>1009,'barrio_zona'=>'B/','distrito_id'=>459));
        
        //49- 469-478   Santa Rosa del Sara
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>2333,'barrio_zona'=>'B/','distrito_id'=>469));
        
        //50- 479-488   Moro Moro
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>440,'barrio_zona'=>'B/','distrito_id'=>480));
        
        //51- 489-498   Ballegrande
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>330,'barrio_zona'=>'B/','distrito_id'=>498));
        
        //52- 499-508   El Trigal
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>220,'barrio_zona'=>'B/','distrito_id'=>504));
        
        //53- 509-518   Postrervalle
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>110,'barrio_zona'=>'B/','distrito_id'=>517));
        
        //54- 519-528   Cupará
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>93,'barrio_zona'=>'B/','distrito_id'=>519));
        
        //55- 529-538   Warnes
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>34,'barrio_zona'=>'B/','distrito_id'=>529));
        
        //56- 539-548   Okinawa
                DB::table('direcciones')->insert(array('avenida_calle'=>'C/Litoral','numero_domicilio'=>654,'barrio_zona'=>'B/','distrito_id'=>539));











