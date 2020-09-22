<?php

namespace App\Http\Controllers;

use App\Array1;
use App\Caso;
use App\Persona;
use App\Paciente;
use App\Departamento;
use App\Direccion;
use App\Distrito;
use App\Medico;
use App\Hospital;
use App\Municipio;
use App\Provincia;
use App\Consulta;
use App\TipoExamen;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Object_;

class ApiController extends Controller
{
    
    public function generarUsuarios(){

        $arrayCalle = [
            'C/Santa Cruz', 'C/San Andres','C/San Antonio'
        ];
        $arrayBarrio =  [
            'villa cochabamba','Monasterio','Urkupiña'
        ];
        $arrayDistrito = [
            1,2,3
        ];
        $arrayDireccion = [

        ];

        $countDireccion = count($arrayCalle);
        for( $i = 0 ; $i < $countDireccion; $i++ ){
            $direccion = new Direccion();
            $direccion->avenida_calle = $arrayCalle[$i]; 
            $direccion->numero_domicilio = rand(100,500); 
            $direccion->barrio_zona = $arrayBarrio[$i]; 
            $direccion->distrito_id = $arrayDistrito[$i];
            $direccion->save();
            array_push($arrayDireccion,$direccion->id);
        }
              
              //Hospitales 
              $hospital = new Hospital();
              $hospital->nombre          = 'Hospital General I';
              $hospital->imagen          = 'imagenes/hospital.jpg';
              $hospital->nivel           = 'tercer';
              $hospital->telefono        =  77368599;
              $hospital->direccion_id    = $arrayDireccion[0];
              $hospital->save();

        $arrayNombre = [
            'Gerardo','Eldy','Leonor'
        ];
        $arraySexo = ["hombre","mujer","mujer"];
        $arrayApellido = [
            'Arias','Maldonado','Maldonado'
        ];
        $arrayRoles=[
            'administrador','medico','paciente'
        ];
        $arrayFechas = [
            '1993-02-23', '1997-04-23', '2007-04-23'
        ];
        $arrayAvatar = [
          'imagenes/avatar-hombre.jpg',
          'imagenes/avatar-mujer.png',
          'imagenes/avatar-mujer.png'
        ];

        $count = count($arrayRoles);

        for( $i = 0 ; $i < $count; $i++ ){
            $persona = new Persona();
            $persona->nombre = $arrayNombre[$i];
            $persona->apellidos =$arrayApellido[$i];
            $persona->ci = rand(66666666,99999999);
            $persona->fecha_nacimiento = $arrayFechas[$i];
            $persona->sexo = $arraySexo[$i];
            $persona->direccion_id = $arrayDireccion[0];
            $persona->save();

            $administrador = User::create([
                'name' => $arrayNombre[$i].'77',
                'email' => $arrayRoles[$i].'@gmail.com',
                'password' => Hash::make('23defebrero'),
                'avatar'=> $arrayAvatar[$i],
            ]);
            
            $administrador->assignRole($arrayRoles[$i]);

            if($arrayRoles[$i]=='medico'){
                $medico = new Medico();
                $medico->id = $persona->id;
                $medico->codigo_medico = rand(5000000,70000000);
                $medico->especialidad_id =1;
                $medico->hospital_id = $hospital->id; 
                $medico->save();
            }
            if($arrayRoles[$i]=='paciente'){
                $paciente = new Paciente();
                $paciente->id = $persona->id;
                $paciente->numero_seguro = rand(5000000,70000000);
                $paciente->save(); 

                $numeroConsultas = rand(1,7);

                for ($i=0; $i < $numeroConsultas; $i++) { 

                  if($i == 0){

                      $fecha_actual = date('Y-m-d');
                      $consulta = new Consulta();
                      $consulta->estado_consulta = 1;
                      $consulta->motivo_consulta  = 'examen covid-19';
                      $consulta->fecha_registrada   =  $fecha_actual;
                      $consulta->fecha_programada = date("Y-m-d",strtotime($fecha_actual."+ 3 days"));
                      $consulta->hora_programada = '20:31:04';
                      $consulta->medico_id = $medico->id ;
                      $consulta->paciente_id = $paciente->id;
                      $consulta->save(); 

                  }
                   


                }
            }
        } 
    }
    public function arrayDepartamentos(){
        return [
            
                'Santa Cruz'
            
        ];
    }
    public function arrayProvincias(){
        return  [
            'Provincia Andrés Ibáñez',
            'Provincia Ángel Sandoval',
            'Provincia Chiquitos',
            'Provincia Cordillera',        
            'Provincia Florida',
            'Provincia Germán Busch',
            'Provincia Guarayos',
            'Provincia Ichilo',
            'Provincia José Miguel de Velasco',
            'Provincia Manuel María Caballero',
            'Provincia Ñuflo de Chávez',
            'Provincia Obispo Santisteban',
            'Provincia Sara',
            'Provincia Vallegrande',
            'Provincia Warnes',
        ];
    }
    public function arrayMunicipios(){
        return [
            [
                'Santa Cruz de la Sierra',
                'Cotoca',
                'El Torno',
                'La guardia',
                'Porongo'
            ],
            [
                'San Matías'
            ],
            [
                'San José de Chiquitos',
                'Pailón',
                'Roboré',
            ],
            [
                'Lagunillas',
                'Boyuibe',
                'Cabezas',
                'Camiri',
                'Charagua',
                'Cuevo',
                'Gutiérrez'
            ],
            [
                'Samaipata',
                'Mairana',
                'Pampa grande',
                'Quirusillas'
            ],
            [
                'Puerto Suárez',
                'Carmen Rivero',
                'Puerto Quijarro'
            ],
            [
                'Ascensión de Guarayos',
                'El puente',
                'Urubichá'
            ],
            [
                'Buena vista',
                'San Carlos',
                'Yapacani',
                'San Juan de Yapacaní'
            ],
            [
                'San Ignacio de Velasco',
                'San Miguel de Velasco',
                'San Rafael de Velasco'
            ],
            [
                'Comarapa',
                'Saipina',
            ],
            [
                'Concepción',
                'Cuatro Cañadas',
                'San Antonio del Lomerío',
                'San Julián',
                'San Ramón',
                'San Xavier',
            ],
             [
                'General Agustín Saavedra',
                'Montero',
                'Minero',
                'Fernández Alonso',
                'San Pedro',
            ],
             [
                'Portachuelo',
                'Colpa Bélgica',
                'Santa Rosa del Sara',
            ],
            [
                'Moro Moro',
                'Ballegrande',
                'el Trigal',
                'Postrervalle',
                'Cupará',
            ],
            [
                'Warnes',
                'Okinawa',
            ],
    
        ];
    }
    public function arrayDistritosCantidad(){
        return [
            15,8,7,4,6,7,6,5,5,7,
            5,7,5,6,8,7,10,5,6,7,
            7,5,5,8,5,6,6,7,5,6,
            5,6,7,8,5,7,6,8,9,5,
            6,5,7,8,5,7,6,9,6,7,
            7,8,9,5,6,8
        ];
    }
    public function arrayBarriosCantidad(){
        return  [
            6,5,5,6,7,10,6,4,7,4,

            8,5,5,6,7,3,6,4,7,8,

            5,5,5,6,7,8,6,6,7,4,

            5,5,5,6,7,3,6,4,7,9,

            8,5,5,6,7,3,6,4,7,4,

            7,5,5,6,7,7,6,4,7,4,

            5,5,5,6,7,10,6,4,7,4,

            5,5,6,6,7,3,6,4,7,6,

            5,5,7,6,7,5,6,4,7,4,

            6,5,5,6,7,7,6,4,7,4,
            5
        ];
            
        
    }
    public function arrayCallesBarriosCantidad(){
        return [
            15,16,18,14,16,14,
            10,11,12,13,15,
            12,13,15,14,15,13,15,
            14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,

            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,

            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,

            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,

            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,

            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
            15,16,18,14,16,14,10,11,12,13,15,12,13,15,14,15,13,15,14,10,
        ];
    }
    public function arrayNombresFemeninos(){
        return [
                "Eldy"
        ];
    }
    public function arrayNombresMasculinos(){
        return [
                "Gerardo"
        ];
    }
    public function arrayPaternos(){
        
        return [
            "Maldonado",
            "Arias",
            "Mendez"
        ];
    }
    public function arrayMaternos(){
        return [
            "Maldonado",
            "Arias",
            "Mendez"
        ];
    }
    public function arrayBarrios(){
        return [
            'Estacion Argentina',
            'Z/ Alto San Pedro',
            'B/Villa Bella',
            'B/lindo',
            'Pampa de la Isla',
            'Villa primero de mayo',
            'B/Virgen de Cotoca',
            'B/Urkupiña',
            'B/Monasterio',
            'B/Guadalupe',
            'B/Ricon del tigre',
            'B/Villa Cochbamba',
            'B/3 de Mayo',
            'B/24 de septiembre',
            'B/5 de agosto',
            'B/Bolivar',
            'B/Venezuela',
            'B/1 de septiembre',
            'B/Tarija',
            'B/Oruro',
            'B/Santa Cruz',
            'B/Guabira',
            'B/German Bush',
            'B/Fatima',
            'B/Villa Virginia',
            'B/Aleman',
            'B/Chino',
            'B/Equipetrol',
            'B/Pando',
            'B/Virgen de Fatima',
            'B/5 de septiembre',
            'B/6 de agosto',
            'B/3 de agosto',
            'B/Mandales',
            'B/Minero',
            'B/Argentino',
            'B/Mexico',
            'B/Chino',
            'B/Moitu',
            'B/La antena',
            'B/Marta Portugal',
            'B/Mercedes',
            'B/San Antonio',
            'B/San Andres',
            'B/Avaroa',
            'B/Angel Sandoval',
            'B/Nuevo Amanecer',
            'B/Abudabi',
            'B/Nueva Bolivia',
            'B/Nuevo Santa Cruz',
            'B/Las Vegas',
            'B/Colombia',
            'B/Castañeda',
            'B/La Cruz',
            'B/San Maximiliano',
            'B/Marceliano',
            'B/Fe y Alegria',
            'B/Evangelico',
            'B/Millonarios',
            'B/Pampa grande',
            'B/Pampa de la madre',
            'B/Rosa',
            'B/Villa Real',
            'B/Villa Monte',
            'B/Warnes',
            'B/9 de octubre',
            'B/11 de julio',
            'B/Norte',
            'B/1 de enero',
            'B/1 de mayo',
            'B/1 de abril',
            'B/2 de agosto',
            'B/Daniel Ribero',
            'Z/Norte',
            'Z/Sur'
        ];

    }
    public function arrayCalles(){
        return [
           
                   'Calle Santa Barbara',
                   'Calle Sandia',
                   'Calle San Pablo',
                   'Calle San Luis De Cáceres',
                   'Calle San Juan De Chacarilla',
                   'Calle San Jorge',
                   'Calle San Javier',
                   'Calle San German',
                   'Calle Urucú',
                   'Calle Urina',
                   'Calle Universo',
                   'Calle Turuguapa',
                   'Calle Tulipanes',
                   'Calle Tucan',
                   'Calle Tarbo',
                   'Calle Sumuqué',
                   'Calle Sucre',
                   'Calle Stig Ryden',
                   'Calle Severo Vásquez Machicado',
                   'Calle Serere',
                   'Calle Senda',
                   'Jumechi',
                   'Julio A. Gutierrez',
                   'Juancito Pinto',
                   'Juana Azurduy',
                   'Juan Pablo II',
                   'Juan Latino',
                   'Juan Carlos Tórrez',
                   'Juan Birch Minchin',
                   'José Peña Castellón',
                   'José Luis Tejada Sorzano',
                   'Josefina Bálsamo',
                   'Jorori',
                   'Calle Río Purús',
                   'Calle Río Mataracú',
                   'Calle Río Jipa',
                   'Calle Río Cuchi',
                   'Calle Río Chontal',
                   'Calle Rurrenabaque',
                   'Calle Reyes Cardona',
                   'Calle Republiquetas',
                   'Calle René Moreno',
                   'Calle Regimiento Lanza',
                   'Calle Regimiento 24',
                   'Calle Raquel Becerra De Busch',
                   'Calle Ramón Clouzet',
                   'Calle Rafael Peña',
                   'Calle Quitachiyú',
                   'Calle Quimorí',
                   'Calle Quijarro',
                   'Calle Quijaro',
                   'Calle Puerto Alonso',
                   'Calle Porongo',
                   'Calle Piso Firme',
                   'Calle Peji',
                   'Calle México',
                   'Dr. Remberto Prado Montaño',
                   'Dr. Néstor J. Otazo',
                   'Dr. Miguel Antelo Parada',
                   'Dr. Lucindo Rosado',
                   'Dr. José Manuel Parada',
                   'Dr. Horacio Sosa',
                   'Dr. Gregorio Balcázar',
                   'Dr. Gabriel Jose Moreno',
                   'Dr. Darío Leigue Sanguino',
                   'Dr. Aquino Rodríguez',
                   'Dr. Antonio Vicente Barba',
                   'Diego De Mendoza',
                   'Calle Saturnino Saucedo',
                   'Calle Sara',
                   'Calle Santiago Ortiz',
                   'Calle Santa Rosa De Lima',
                   'Guapuru',
                   'Guapilo',
                   'Guajojó',
                   'Guairu',
                   'Fortín Arce',
                   'Fortin Corrales',
                   'Florida',
                   'Flor De Caña',
                   'Fidel Oliva',
                   'Felix Bascopé',
                   'Estonia',
                   'Espejos',
                   'Enrique Finot',
                   'Enconada',
                   'El Vagaso',
                   'El Trapiche',
                   'El Torno',
                   'El Palmar',
                   'El Fuerte',
                   'El Filo',
                   'El Dorado',
                   'El Cedro',
                   'Edmundo Roca',
                   'Ecuador',
                   'Dr. Rómulo Lozada Quezada',
                   'Cuevo',
                   'Cuatro Ojos',
                   'Cslle 9',
                   '11 Oeste',
                   'Avenida Primera',
                   'Avenida Segunda',
                   'Bajada De Las Flores',
                   'Camino A Las Cruces',
                   'Camino Al Urubo',
                   'Camino Antiguo A Porongo',
                   'Curupaú',
                   'Entrada Al Urubó',
                   'Paseo Del Bosque',
                   'Puente Del Urubó',
                   'Siete',
                   'Urubo-Porongo',
                   'Via Urubo-Porongo',
                   'Via Urubo-Porongo-Las Cruces',
                   'Vía Urubó - Porongo',
                   'Avenida 19 De Junio',
                   'Avenida 24 De Septiembre',
                   'Avenida Paseo Central',
                   'Camino Antiguo A Porongo',
                   'Los Mangos',
                   'Los Olivos',
                   'Nueva Esperanza',
                   'Octavo Anillo',
                   'Radial 17 1/2',
                   'Rn7: Doble Vía Santa Cruz-La Guardia',
                   '1 Este',
                   '1 Norte',
                   '1 Oeste',
                   '1 Sur',
                   '1-A',
                   '10 De Febrero',
                   '10 De Octubre',
                   '10 Este',
                   '10 Norte',
                   '10 Oeste',
                   '10 Sur',
                   '11 De Mayo',
                   '11 Norte',
                   '11 Oeste',
                   '11 Sur',
                   '12 De Abril',
                   '12 De Julio',
                   '12 Este',
                   '12 Norte',
                   '12 Oeste',
                   '12 Sur',
                   '13 Este',
                   '14 Este',
                   '14 Norte',
                   '14 Oeste',
                   '14 Sur',
                   '18 Este',
                   '18 Oeste',
                   '19 De Marzo',
                   '19 Este',
                   '19 Oeste',
                   '1o. De Mayo',
                   '1ro. De Mayo',
                   '2 Este',
                   '2 Norte',
                   '2 Oeste',
                   '2 Pasillo',
                   '2 Sur',
                   '20 De Enero',
                   '20 De Octubre',
                   '20 Este',
                   '3 Norte',
                   '3 Sur',
                   '3-A',
                   '30 De Agosto',
                   '31 De Diciembre',
                   '31 De Julio',
                   '3ll',
                   '4 - Ecuador',
                   '4 Este',
                   '4 Hermanos',
                   '4 Norte',
                   '4 Oeste',
                   '4 Sur',
                   '4-A',
                   '5 - Paraguay',
                   '5 Este',
                   '5 Norte',
                   '5 Oeste',
                   '5 Sur',
                   '5-B',
                   '6 - Uruguay',
                   '6 De Agosto',
                   '6 De Junio',
                   '6 Este',
                   '6 Norte',
                   '6 Oeste',
                   '6 Sur',
                   '7 - Perú',
                   '7 Copas',
                   '7 De Agosto',
                   '7 De Marzo',
                   '7 Este',
                   '7 Norte',
                   '7 Oeste',
                   '7 Sur',
                   '8 - Venezuela',
                   '8 De Diciembre',
                   '8 De Febrero',
                   '8 Este',
                   '8 Norte',
                   '8 Oeste',
                   '8 Sur',
                   '9 - Panamá',
                   '9 De Junio',
                   '9 De Octubre',
                   '9 Este',
                   '9 Norte',
                   '9 Oeste',
                   '9 Oeste Col Nacional Florida',
                   '9 Sur',
                   '9-A Norte',
                   '9-B Norte',
                   '9-C Norte',
                   '9-D Norte',
                   'A. Casona',
                   'A. Gutiérrez',
                   'A. Rodin',
                   'A. Ríos',
                   'A. Soruco',
                   'Abapó',
                   'Achachairú',
                   'Adolfo Aponte',
                   'Adolfo Becker',
                   'Agata',
                   'Agua Marina',
                   'Aguairenda',
                   'Aguamarina',
                   'Aguaragüe',
                   'Agusto Chávez',
                   'Aireyu',
                   'Aurelio Echazú E.',
                   'Aurelio Roca Lladó R.',
                   'Av 2 De Agosto',
                   'Av 22 De Septiembre',
                   'Av. Arroyitos',
                   'Avaroa',
                   'Avenida 14 De Marzo',
                   'Avenida 14 De Septiembre',
                   'Avenida 15 De Agosto',
                   'Avenida 16 De Julio',
                   'Avenida 16 De Noviembre',
                   'Avenida 18 De Marzo',
                   'Avenida 18 De Mayo',
                   'Avenida 18 De Noviembre',
                   'Avenida 2 De Agosto',
                   'Avenida 22 De Septiembre',
                   'Avenida 24 De Septiembre',
                   'Avenida 25 De Mayo',
                   'Avenida 25 De Octubre',
                   'Avenida 26 De Febrero',
                   'Avenida Bibosi',
                   'Avenida Blooming',
                   'Avenida Bolivia',
                   'Avenida Bonifacio Barrientos',
                   'Avenida Brasil',
                   'Avenida Busch',
                   'Avenida C',
                   'Avenida Canal Guapilo',
                   'Avenida Capitán Alfredo Higazy',
                   'Avenida Carmelo Ortiz Taborga',
                   'Avenida Cañoto',
                   'Avenida Centenario',
                   'Avenida Centinelas Del Chaco',
                   'Avenida Charcas',
                   'Avenida Che Guevara',
                   'Avenida Clara Progreso',
                   'Avenida Claracuta',
                   'Avenida Colonel Maximiliano España',
                   'Avenida Cristo Redentor',
                   'Avenida Cristobal De Mendoza',
                   'Avenida D',
                   'Avenida De Playa',
                   'Avenida Domingo Savio',
                   'Avenida Dr. Antonio Landivar Serrate',
                   'Avenida Dr. Enrique Aponte Canseco',
                   'Avenida Dr. Nestor Paz Zamora',
                   'Avenida Dr. Rómulo Herrera Justiniano',
                   'Avenida Dr. Rómulo Herrerajustiniano',
                   'Avenida E',
                   'Avenida Ecologica',
                   'Avenida Ecológica',
                   'Avenida Ejército Nacional',
                   'Avenida El Carmen',
                   'Avenida José Banegas',
                   'Avenida José Benjamín Burela Justiniano',
                   'Avenida José Gil Soruco',
                   'Avenida Juan Pablo II',
                   'Avenida Julio Salmón Parada',
                   'Avenida La Barranca',
                   'Avenida La Campana',
                   'Avenida La Colorada',
                   'Avenida La Salle',
                   'Avenida Landivar',
                   'Avenida Las Américas',
                   'Avenida Las Cachuelas',
                   'Avenida Las Palmeras',
                   'Avenida Las Vegas',
                   'Avenida Leigue Castedo',
                   'Avenida Leonardo Da Vinci',
                   'Avenida Libertadores',
                   'Avenida Litoral',
                   'Avenida Londres',
                   'Avenida Los Chacos',
                   'Avenida Los Claveles',
                   'Avenida Los Cusis',
                   'Avenida Los Paraísos',
                   'Avenida Los Pinos',
                   'Avenida Luis Espinal Campos',
                   'Avenida Luis Saavedra Suárez (Este)',
                   'Avenida Luis Saavedra Suárez (Oeste)',
                   'Avenida Madre Selva',
                   'Avenida Mara',
                   'Avenida Marcelo Quiroga Santa Cruz',
                   'Avenida Marcelo Terceros Banzer',
                   'Avenida Marcelo Terceros Bánzer',
                   'Avenida Mariano Saucedo Sevilla',
                   'Avenida Mariscal Santa Cruz',
                   'Avenida María Auxiliadora',
                   'Avenida Melchor Pinto',
                   'Avenida Miguel De Cervantes',
                   'Avenida Miguel Servet',
                   'Avenida Milton Parra P',
                   'Avenida Mons Andrés Avelino Costas',
                   'Avenida Monseñor Rivero',
                   'Avenida Montecristo',
                   'Avenida Moscú',
                   'Avenida Mutualista',
                   'Avenida N Jerusalen',
                   'Avenida Niño Jesús',
                   'Avenida Noel Kempff Mercado',
                   'Avenida Nuevo Palmar',
                   'Avenida Olímpica',
                   'Avenida Omar Chávez Ortiz',
                   'Avenida Oriental',
                   'Avenida Ovidio Barbery Justiniano',
                   'Avenida P Rivera M',
                   'Avenida Palmira',
                   'Avenida Panamericana',
                   'Avenida Pando',
                   'Avenida Paraguá',
                   'Avenida Paurito',
                   'Avenida Pauserna',
                   'Avenida Pedro Casals',
                   'Avenida Pedro Marban',
                   'Avenida Perimetral',
                   'Avenida Picana',
                   'Avenida Pilcomayo',
                   'Avenida Piraí',
                   'Avenida Plan Tres Mil',
                   'Avenida Prefecto Rivas',
                   'Avenida Primero De Mayo',
                   'Avenida Principal',
                   'Avenida Principal Los Chacos',
                   'Avenida Prinicipal',
                   'Avenida Prolongacion Bolivia',
                   'Avenida Prolongacion San Pablo',
                   'Avenida Prolongación Mutualista',
                   'Avenida R Barrientos',
                   'Avenida Recoleta',
                   'Avenida República Del Japón',
                   'Avenida Richard Crushing',
                   'Avenida Roca Y Coronado',
                   'Avenida Roque Aguilera',
                   'Avenida Salvador',
                   'Avenida San Aurelio',
                   'Avenida San Bartolomé',
                   'Avenida San Felipe',
                   'Avenida San Jorge',
                   'Avenida San Juan',
                   'Avenida San Juan Calle 6',
                   'Avenida San Martín',
                   'Avenida San Martín De Porres',
                   'Avenida San Sebastián',
                   'Avenida San Silvestre',
                   'Avenida Santa Cruz',
                   'Avenida Santos Doumont',
                   'Avenida Santos Dumont',
                   'Avenida Soberanía Nacional',
                   'Avenida Sudamericana',
                   'Avenida Suárez Arana',
                   'Avenida Tarumá',
                   'Avenida Tocopilla',
                   'Avenida Tomás De Lezo',
                   'Avenida Totaí',
                   'Avenida Totaíces',
                   'Avenida Transcontinental',
                   'Avenida Transportista',
                   'Avenida Tres Pasos Al Frente',
                   'Avenida Trinidad',
                   'Avenida Tte. Mamerto Cuéllar',
                   'Avenida Universo',
                   'Avenida Uruguay',
                   'Avenida Vallegrande',
                   'Avenida Velarde',
                   'Avenida Viedma',
                   'Avenida Virgen De Cotoca',
                   'Avenida Virgen De Fátima',
                   'Avenida Virgen De Luján',
                   'Avenida Viru Viru',
                   'Avenids P Rivera M',
                   'Azurita',
                   'Añapanco',
                   'B. Plito',
                   'Bachavi',
                   'Bahía Cáceres',
                   'Bahía Negra',
                   'Bailecito',
                   'Bailón Mercado',
                   'Bajada De Las Flores',
                   'Baldomero',
                   'Ballivián',
                   'Baltazar',
                   'Bandera',
                   'Baracea',
                   'Barchilones',
                   'Barraca Japurí',
                   'Bartolomé Zankis',
                   'Batallón Colorados',
                   'Bautista Saavedra',
                   'Bella Vista',
                   'Belén',
                   'Beni',
                   'Berea',
                   'Bermejo',
                   'Bernardino Barbery',
                   'Bethesda',
                   'Bibosi',
                   'Bibósi',
                   'Blenda',
                   'Bohemios',
                   'Bolivia',
                   'Bolivianita',
                   'Bolívar',
                   'Bonifacio Barrientos',
                   'Boquerón',
                   'Boulevar',
                   'Bravo',
                   'Brillante',
                   'Bucarest',
                   'Buceta',
                   'Budapest',
                   'Buena Vista',
                   'Buenos Aires',
                   'Buganvillas',
                   'Buho Blanco',
                   'Bustamante',
                   'C. Mendoza',
                   'C. Rodríguez',
                   'Caballero',
                   'Cabezas',
                   'Cabo Andrés Tórrez',
                   'Cabo Augusto Doise',
                   'Cabo Gumercindo Coronado',
                   'Cabo Quiroga',
                   'Cabo Teodoro Bejarano',
                   'Cabo Wenceslao Hurtado',
                   'Caigua',
                   'Calama',
                   'California',
                   'Calle',
                   'Calle 1',
                   'Calle 1 - Argentina',
                   'Calle 1 Este',
                   'Calle 1 Norte',
                   'Calle 1 Oeste',
                   'Calle 1-B',
                   'Calle 10',
                   'Calle 10 De Noviembre',
                   'Calle 11',
                   'Calle 12',
                   'Calle 13',
                   'Calle 14',
                   'Calle 14 De Septiembre',
                   'Calle 14b',
                   'Calle 15',
                   'Calle 15 De Diciembre',
                   'Calle 16',
                   'Calle 17',
                   'Calle 17 De Abril',
                   'Calle 17 De Agosto',
                   'Calle 18',
                   'Calle 19',
                   'Calle 19 De Julio',
                   'Calle 19 De Marzo',
                   'Calle 2',
                   'Calle 2 Este',
                   'Calle 2 Oeste',
                   'Calle 2 Oeste / 2 Norte',
                   'Calle 2-A',
                   'Calle 20',
                   'Calle 21',
                   'Calle 21 De Mayo',
                   'Calle 22',
                   'Calle 23',
                   'Calle 23 De Marzo',
                   'Calle 24',
                   'Calle 24 De Julio',
                   'Calle 24 De Septiembre',
                   'Calle 26 De Julio',
                   'Calle 27 De Mayo',
                   'Calle 2b',
                   'Calle 3',
                   'Calle 3 De Mayo',
                   'Calle 3 Este',
                   'Calle 3 Norte',
                   'Calle 3 Oeste',
                   'Calle 30 De Ferero',
                   'Calle 31 De Julio',
                   'Calle 4',
                   'Calle 4 De Junio',
                   'Calle 4 Este',
                   'Calle 4 Oeste',
                   'Calle 4-B',
                   'Calle 5',
                   'Calle 5 Este',
                   'Calle 5 Oeste',
                   'Calle 5 Pasillo D',
                   'Calle 5-B',
                   'Calle 6',
                   'Calle 6 De Agosto',
                   'Calle 6 De Junio',
                   'Calle 6 Este',
                   'Calle 6 Final Oeste',
                   'Calle 6 Oeste',
                   'Calle 7',
                   'Calle 7 De Marzo',
                   'Calle 7 Este',
                   'Calle 7 Oeste',
                   'Calle 8',
                   'Calle 8 Este',
                   'Calle 9',
                   'Calle 9 Este',
                   'Calle A',
                   'Calle A De Zanabria',
                   'Calle A Dumas',
                   'Calle A Verdugo',
                   'Calle A. De Coca',
                   'Calle A. Gutiérrez',
                   'Calle A. Saavedra',
                   'Calle Abayoy',
                   'Calle Abuná',
                   'Calle Acapulco',
                   'Calle Achachairú',
                   'Calle Acre',
                   'Calle Adela Salmón',
                   'Calle Adán Gutierrez',
                   'Calle Adán Gutiérrez',
                   'Calle Agreda',
                   'Calle Aguaí',
                   'Calle Alameda',
                   'Calle Alameda Junín',
                   'Calle Alcide DOrbigny',
                   'Calle Alejo García',
                   'Calle Alfredo Flores',
                   'Calle Alicia Suarez',
                   'Calle Alonso Delgado',
                   'Calle Alonso Roa Y Cañizares',
                   'Calle Alto Seco',
                   'Calle Alvares Nava',
                   'Calle Ana Barba',
                   'Calle Andres De Arte',
                   'Calle Andrés Manso',
                   'Calle Andrés Mestre',
                   'Calle Angostura',
                   'Calle Antonio De Luque',
                   'Calle Antonio Suárez',
                   'Calle Antonio V Ardaya',
                   'Calle Antón Cabrera',
                   'Calle Arauteclo',
                   'Calle Arenales',
                   'Calle Armonia',
                   'Calle Aroma',
                   'Calle Arturo Lawrence',
                   'Calle Aruma',
                   'Calle Asai',
                   'Calle Ascención',
                   'Calle Asunción',
                   'Calle Asunta De Soruco',
                   'Calle Atlántica',
                   'Calle Autonomia',
                   'Calle Avaroa',
                   'Calle Ayacucho',
                   'Calle Azubi',
                   'Calle B',
                   'Calle B Camargo',
                   'Calle B De Molina',
                   'Calle B Final',
                   'Calle B. Plito',
                   'Calle Bagres',
                   'Calle Ballivián',
                   'Calle Baltazar Espinoza',
                   'Calle Baracea',
                   'Calle Barachavi',
                   'Calle Barbery',
                   'Calle Barcelona',
                   'Calle Barrón',
                   'Calle Bartolome De Acosta',
                   'Calle Bartos',
                   'Calle Basilio Durán',
                   'Calle Batalla De Toledo',
                   'Calle Batelón',
                   'Calle Baudelaire',
                   'Calle Baures',
                   'Calle Bautista Saavedra',
                   'Calle Belén',
                   'Calle Beni',
                   'Calle Berlín',
                   'Calle Bernabé Sosa',
                   'Calle Bernado Cadario',
                   'Calle Bernanos',
                   'Calle Bernardino De Ávila',
                   'Calle Bernardino Gutiérrez',
                   'Calle Bibosi',
                   'Calle Bolivia',
                   'Calle Bolpebra',
                   'Calle Bolívar',
                   'Calle Boyiube',
                   'Calle Bruno Racua',
                   'Calle Buena Vista',
                   'Calle Buenos Aires',
                   'Calle Bumberque',
                   'Calle Burapucú',
                   'Calle Bustamante',
                   'Calle Buzios',
                   'Calle Byron',
                   'Calle C',
                   'Calle C Antonio Anglarill',
                   'Calle C Chavez',
                   'Calle Caballero',
                   'Calle Calama',
                   'Calle Camatindi',
                   'Calle Campero',
                   'Calle Campo Grande',
                   'Calle Campo Santa Rosa',
                   'Calle Canadá',
                   'Calle Cancún',
                   'Calle Cap. Antonio López C',
                   'Calle Cap. Antonio Álvarez',
                   'Calle Cap. Bartolomé Moya',
                   'Calle Cap. Francisco J. De Velasco',
                   'Calle Cap. Juan Bartelemí Verdugo',
                   'Calle Cap. Melchor Rodríguez',
                   'Calle Cap. Pedro Pablo Urquijo',
                   'Calle Cap. Álvaro De Chávez',
                   'Calle Capitan B Urgel',
                   'Calle Capitan Manuel Tovar',
                   'Calle Capitan Manuel Valverde',
                   'Calle Capitán Carmelo Salvatierra',
                   'Calle Capitán Gonzalo Moreno',
                   'Calle Capitán Ignacio Paz',
                   'Calle Cardenal',
                   'Calle Carlos Landivar Velarde',
                   'Calle Carlos Mayser',
                   'Calle Carlos Melquiades Barbery',
                   'Calle Carmelo Llanos',
                   'Calle Castelnau',
                   'Calle Castor Franco',
                   'Calle Cayú',
                   'Calle Cañada',
                   'Calle Cañada Larga',
                   'Calle Celia Marcó',
                   'Calle Celso Castedo',
                   'Calle Cerro El Alegre',
                   'Calle Ch',
                   'Calle Charcas',
                   'Calle Chaucer',
                   'Calle Chesterton',
                   'Calle Chichapí',
                   'Calle Chimanes',
                   'Calle Chino Méndez',
                   'Calle Chiquitos',
                   'Calle Chirimoya',
                   'Calle Chituri',
                   'Calle Choferes Del Chaco',
                   'Calle Chomono',
                   'Calle Chonta',
                   'Calle Chuchío',
                   'Calle Chuquisaca',
                   'Calle Churuno',
                   'Calle Chuturubises',
                   'Calle Chuubi',
                   'Calle Cira V De Aponte',
                   'Calle Ciro Bravo',
                   'Calle Clar',
                   'Calle Claudio Farfán',
                   'Calle Clotilde Velsaco',
                   'Calle Clotilde Velásco',
                   'Calle Cnl. Antonio Aymerich',
                   'Calle Cnl. Francisco Pérez Villaronte',
                   'Calle Cnl. Miguel Zamora Triviño',
                   'Calle Cnl. Tomás De Aguilera',
                   'Calle Cobija',
                   'Calle Cochabamba',
                   'Calle Colombia',
                   'Calle Colonel Diego Martinez',
                   'Calle Colonel J Valdivia',
                   'Calle Colorados De Bolivia',
                   'Calle Colpa',
                   'Calle Colón',
                   'Calle Comarapa',
                   'Calle Combate Bagué',
                   'Calle Combate Bella Flor',
                   'Calle Combate Riosiño',
                   'Calle Combate Vuelta Empresa',
                   'Calle Conrad',
                   'Calle Cordecruz',
                   'Calle Corneille',
                   'Calle Coronel Gualberto Villaroel',
                   'Calle Coronel Rosendo Rojas',
                   'Calle Corumba',
                   'Calle Corumbá',
                   'Calle Cosorio',
                   'Calle Crisanto Valverde',
                   'Calle Cristobal De Samaniego',
                   'Calle Cristobal De Sandóval',
                   'Calle Cristobal Reyes',
                   'Calle Cuiabá',
                   'Calle Cupechicho',
                   'Calle Cupesi',
                   'Calle Cupesí',
                   'Calle Curupaú',
                   'Calle Cuyabos',
                   'Calle Cuéllar',
                   'Calle D',
                   'Calle D Perez Velsaco',
                   'Calle Dagoberto Justiniano',
                   'Calle Daniel Salamanca',
                   'Calle David Trapero',
                   'Calle Dechia',
                   'Calle Destacsmento 132',
                   'Calle Destroyers',
                   'Calle Diego Alcaya',
                   'Calle Diego De Ampuero',
                   'Calle Diego De Matos',
                   'Calle Diego Guerra',
                   'Calle Diego Gómez',
                   'Calle Diego López Roca',
                   'Calle Domingo Bendeira',
                   'Calle Dr G Moreno',
                   'Calle Dr Pedro Aristides',
                   'Calle Dr. Adolfo Flores',
                   'Calle Dr. Agustín Landívar',
                   'Calle Dr. Alejandro Ramírez',
                   'Calle Dr. Alfredo Parada',
                   'Calle Dr. Andrés S. Muñoz',
                   'Calle Dr. Anibal Peña',
                   'Calle Dr. Fermín Peralta',
                   'Calle Dr. Gilberto Molina Barbery',
                   'Calle Dr. Ismael Suárez',
                   'Calle Dr. Joaquín Sierra',
                   'Calle Dr. José A. Palacio',
                   'Calle Dr. José Peredo A.',
                   'Calle Dr. José Zarco M.',
                   'Calle Dr. Mamerto Salas',
                   'Calle Dr. Manuel De La Vía',
                   'Calle Dr. Marcos Terrazas',
                   'Calle Dr. Ovidio Santiestevan',
                   'Calle Dr. Pablo Busch',
                   'Calle Dr. Pedro Rodríguez',
                   'Calle Dr. Victorino Rivero Egüez',
                   'Calle Dr. Víctor Pinto',
                   'Calle Dra. María De Boland',
                   'Calle Dra. María De Oliveira',
                   'Calle E',
                   'Calle Ecuador',
                   'Calle Edgar Poe',
                   'Calle El Paraiso',
                   'Calle El Paúro',
                   'Calle El Sol',
                   'Calle Elbi',
                   'Calle Elda Viera',
                   'Calle Elena Salvatierra',
                   'Calle Elena V. De Ibañez',
                   'Calle Elisa Aguillera',
                   'Calle Elvira De Mendoza',
                   'Calle Emilio Molina',
                   'Calle Emperador',
                   'Calle Enrique Atala',
                   'Calle Entre Rios',
                   'Calle Ernestina Camacho',
                   'Calle Escuadrón De V',
                   'Calle España',
                   'Calle Esteban Rosas',
                   'Calle Estevenson',
                   'Calle Eusebio Languidey',
                   'Calle Exaltación',
                   'Calle F',
                   'Calle F Pedro Guerra',
                   'Calle Farid Mendoza',
                   'Calle Fe Y Alegría',
                   'Calle Federico Ahlfeld',
                   'Calle Federico Figueroa',
                   'Calle Feliciana Rodríguez',
                   'Calle Felipe Leonor Ribera',
                   'Calle Fernan Gomez',
                   'Calle Fernando Paticú',
                   'Calle Fernando Pitacu',
                   'Calle Fernán Campos',
                   'Calle Filipenses',
                   'Calle Final Buenos Aires',
                   'Calle Florida',
                   'Calle Francia',
                   'Calle Francisco De Chavez',
                   'Calle Francisco De Coimbra',
                   'Calle Francisco Delgado',
                   'Calle Francisco Durán',
                   'Calle Francisco Gallego',
                   'Calle Francisco Gomez',
                   'Calle Francisco Gutiérrez',
                   'Calle Francisco Javier Cuéllar',
                   'Calle Francisco Javier Zambrana',
                   'Calle Francisco Rengifo',
                   'Calle Francisco Rodriguez',
                   'Calle Francisco Santiago Del Rivero',
                   'Calle Friar Francisco Cabot',
                   'Calle Froilan Almaraz',
                   'Calle Froilan Roca',
                   'Calle G',
                   'Calle G. De Acuña',
                   'Calle G. Velasco',
                   'Calle Gabriel Diaz',
                   'Calle Gabriel Ortiz',
                   'Calle Genaro Blacut',
                   'Calle General Federico Román',
                   'Calle General Luis Rodriguez B',
                   'Calle General Robledo',
                   'Calle General Saavedra',
                   'Calle German Greene',
                   'Calle Germán Erraez',
                   'Calle Girasoles',
                   'Calle Gladiolos',
                   'Calle Gob. Alonso Verdugo',
                   'Calle Gob. Antonio De Ribas',
                   'Calle Gob. Antonio De Rojas',
                   'Calle Gob. Beltrán De Otazú',
                   'Calle Gob. Benito De Ribera Y Quiroga',
                   'Calle Gob. Florián Girón',
                   'Calle Gob. García Hurtado De Mendoza',
                   'Calle Gob. Gral Diego De Trejo',
                   'Calle Gob. Gral. Francisco Xavier De Aguilera',
                   'Calle Gob. Lorenzo Dávila De Herrera',
                   'Calle Gob. Pedro Gálvez Ordóñez',
                   'Calle Gob. Álvaro Velásquez De Camargo',
                   'Calle Gobernación',
                   'Calle Golondrina',
                   'Calle Grahan Greene',
                   'Calle Guajojó',
                   'Calle Guapilo',
                   'Calle Guapomó',
                   'Calle Guapuru',
                   'Calle Guarey Norte',
                   'Calle Guariyú',
                   'Calle Guatemala',
                   'Calle Guayacán',
                   'Calle Guayaramerín',
                   'Calle Guembé',
                   'Calle Guillermo Milliet',
                   'Calle Guillermo Rivero',
                   'Calle Guiracota',
                   'Calle Gustavo Parada',
                   'Calle H',
                   'Calle Haití',
                   'Calle Hans Grether',
                   'Calle Hermanos',
                   'Calle Hernando Caballero',
                   'Calle Hernando De Cazoria',
                   'Calle Hernando Zanabria',
                   'Calle Hernán Aldava Paz',
                   'Calle Honduras',
                   'Calle Horacio Ríos',
                   'Calle Horcas De Chavez',
                   'Calle Horizonte',
                   'Calle Huacaraje',
                   'Calle Humberto Ibáñez Soruco',
                   'Calle I',
                   'Calle Ichilo',
                   'Calle Independencia',
                   'Calle Ingavi',
                   'Calle Ingeniero Edwin Heath',
                   'Calle Ingeniero Rolando De Chazal',
                   'Calle Isabel La Católica',
                   'Calle Isoso',
                   'Calle Israel',
                   'Calle Iténez',
                   'Calle J',
                   'Calle J G Hurtado',
                   'Calle J Vivero',
                   'Calle J. De Ayarza',
                   'Calle Jacarandá',
                   'Calle Jack London',
                   'Calle James Joyce',
                   'Calle Jaurú',
                   'Calle Jerusalén',
                   'Calle Jesús Gómez',
                   'Calle Jevio',
                   'Calle Jipurí',
                   'Calle Joaquin Pantoja',
                   'Calle Jochis',
                   'Calle Jorge De Herrera',
                   'Calle Jorge Peralta S',
                   'Calle Jorochito',
                   'Calle Jorori',
                   'Calle Jose Callau',
                   'Calle Jose De Gil Y Egüez',
                   'Calle Jose Manuel Prado',
                   'Calle Jose Mercado Aguaro',
                   'Calle Jose Natuch V',
                   'Calle José Bru',
                   'Calle José Cronembold',
                   'Calle José Félix Roca',
                   'Calle José Ignacio Méndez',
                   'Calle José M. Bazán',
                   'Calle José M. Carrillo',
                   'Calle José Mercado Aguado',
                   'Calle José Salvatierra',
                   'Calle José Vicente Suárez',
                   'Calle José Vásquez Machicado',
                   'Calle Juan E Roca',
                   'Calle Juan Irigotti',
                   'Calle Juan L Mendez',
                   'Calle Juan Manuel Arias',
                   'Calle Juan Montero De Espinoza',
                   'Calle Juan Oviendo De Quiñones',
                   'Calle Juan Peñarrieta',
                   'Calle Juan Zárraga Campos',
                   'Calle Julia Ríos',
                   'Calle Junín',
                   'Calle Justa Paz',
                   'Calle K',
                   'Calle Kris',
                   'Calle La Barranca',
                   'Calle La Fontaine',
                   'Calle La Guardia',
                   'Calle La Haya',
                   'Calle La Paz',
                   'Calle La Riva',
                   'Calle La Rochela',
                   'Calle Las Ambaibas',
                   'Calle Las Antas',
                   'Calle Las Bandurrias',
                   'Calle Las Barreras',
                   'Calle Las Cuquizas',
                   'Calle Las Cutas',
                   'Calle Las Garzas',
                   'Calle Las Gaviotas',
                   'Calle Las Gemelas',
                   'Calle Las Liras',
                   'Calle Las Maras',
                   'Calle Los Melones',
                   'Calle Los Motojobobos',
                   'Calle Los Paltos',
                   'Calle Los Paraiso',
                   'Calle Los Paraisos',
                   'Calle Los Penocos',
                   'Calle Los Pinos',
                   'Calle Los Pitones',
                   'Calle Los Piyos',
                   'Calle Los Pororos',
                   'Calle Los Sauces',
                   'Calle Los Socoris',
                   'Calle Los Tajibos',
                   'Calle Los Tamarindos',
                   'Calle Los Tapiosis',
                   'Calle Los Taracoés',
                   'Calle Los Tarechis',
                   'Calle Los Taropes',
                   'Calle Los Tejones',
                   'Calle Los Tiluchis',
                   'Calle Los Toborochis',
                   'Calle Los Tojos',
                   'Calle Los Tordos',
                   'Calle Los Totaquis',
                   'Calle Los Tucanes',
                   'Calle Los Tureres',
                   'Calle Los Ángeles',
                   'Calle Luciano Justiniano',
                   'Calle Lucía Mercado',
                   'Calle Luis Alvarez',
                   'Calle Luis Donato Moreira',
                   'Calle Luis Lavadenz Barrio',
                   'Calle Luisa Wichtendahl',
                   'Calle Luz De Vida',
                   'Calle M Arteaga',
                   'Calle M De Almendras',
                   'Calle M Juan De Ribera',
                   'Calle M Reyes Cardona',
                   'Calle M Veldaco De Rubin',
                   'Calle M. Rodriguez',
                   'Calle Magdalena',
                   'Calle Majo',
                   'Calle Mal Raux',
                   'Calle Mamerto Oyola',
                   'Calle Mamoré',
                   'Calle Manuel Escalante',
                   'Calle Manuel Ignacio Salvatierra',
                   'Calle Manuel Jesús Parada',
                   'Calle Manuel Limpias',
                   'Calle Manuel Marcó',
                   'Calle Manuel Urbano Camila',
                   'Calle Manuel Zudañez',
                   'Calle Manuela Velasco',
                   'Calle Manuripi',
                   'Calle Mapaiso',
                   'Calle Mapajo',
                   'Calle Marayaú',
                   'Calle Marañón',
                   'Calle Mark Twain',
                   'Calle Marte',
                   'Calle Masi',
                   'Calle Masicuri',
                   'Calle Matico',
                   'Calle Matilda Ferrier',
                   'Calle Mato Grosso',
                   'Calle Mc. Kenney',
                   'Calle Medardo Chávez',
                   'Calle Media Luna',
                   'Calle Melchor Mariscal',
                   'Calle Membiray',
                   'Calle Mercado',
                   'Calle Mercado Saucedo',
                   'Calle Mercurio',
                   'Calle Miguel Castro Pinto',
                   'Calle Miguel H. Cervantes',
                   'Calle Miguel M. De Aguirre',
                   'Calle Miguel Toledo',
                   'Calle Minsk',
                   'Calle Moldes',
                   'Calle Moliere',
                   'Calle Monaco',
                   'Calle Monseñor José Cándido Peña',
                   'Calle Monseñor José Santiestevan',
                   'Calle Monseñor Juan Pablo De Olmedo',
                   'Calle Monseñor Manuel Angel Del Prado',
                   'Calle Montegrnade',
                   'Calle Montenegro',
                   'Calle Mores',
                   'Calle Motacu',
                   'Calle Motacú',
                   'Calle Motoye',
                   'Calle Motoyoé',
                   'Calle Moxos',
                   'Calle Murillo',
                   'Calle Mururé',
                   'Calle Musuruquí',
                   'Calle Máximo Henicke',
                   'Calle México',
                   'Calle N',
                   'Calle Napoleon Rodriguez',
                   'Calle Naranja',
                   'Calle Nazareth',
                   'Calle Pavi',
                   'Calle Pedro De Aguayo',
                   'Calle Pejerrey',
                   'Calle Peji',
                   'Calle Percy Fawcett',
                   'Calle Perú',
                   'Calle Picada',
                   'Calle Piso Firme',
                   'Calle Plutón',
                   'Calle Plácido Molina',
                   'Calle Polonia',
                   'Calle Ponce León',
                   'Calle Ponta Grossa',
                   'Calle Poresaquí',
                   'Calle Porongo',
                   'Calle Portón',
                   'Calle Potosí',
                   'Calle Pozo',
                   'Calle Primavera',
                   'Calle Principal',
                   'Calle Profesor. Félix Satori R.',
                   'Calle Puerto Alonso',
                   'Calle Quijaro',
                   'Calle Quijarro',
                   'Calle Quimorí',
                   'Calle Quitachiyú',
                   'Calle R Lairana',
                   'Calle R Terrazas',
                   'Calle R. Justiniano',
                   'Calle Racine',
                   'Calle Rafael Peña',
                   'Calle Rafaela',
                   'Calle Ramón Barba',
                   'Calle Ramón Clouzet',
                   'Calle Raquel Becerra De Busch',
                   'Calle Regimiento 24',
                   'Calle Regimiento 30',
                   'Calle Regimiento Lanza',
                   'Calle René Moreno',
                   'Calle Republiquetas',
                   'Calle Reyes Cardona',
                   'Calle Riberalta',
                   'Calle Rio Guayari',
                   'Calle Roberto Téllez Cronembold',
                   'Calle Rodolfo Antello',
                   'Calle Rogelia Rojo',
                   'Calle Roillo',
                   'Calle Romelio Antúnez',
                   'Calle Romelio Antúnez (2b)',
                   'Calle Rosa Casas',
                   'Calle Rosas',
                   'Calle Rurrenabaque',
                   'Calle Río Apere',
                   'Calle Río Blanco',
                   'Calle Río Chontal',
                   'Calle Río Cuchi',
                   'Calle Río Cuñucú',
                   'Calle Río De Janeiro',
                   'Calle Río Hondo',
                   'Calle Río Jipa',
                   'Calle Río La Ciénega',
                   'Calle Río Madera',
                   'Calle Río Mataracú',
                   'Calle Río Morotoco',
                   'Calle Río Negro',
                   'Calle Río Purús',
                   'Calle Río Saguayo',
                   'Calle Río Verde',
                   'Calle Río Vilcas',
                   'Calle S. Ortiz',
                   'Calle S/N',
                   'Calle S/N 1',
                   'Calle Sabalos',
                   'Calle Saint Exuperi',
                   'Calle San German',
                   'Calle San Javier',
                   'Calle San Joaquín',
                   'Calle San Jorge',
                   'Calle San Jose',
                   'Calle San Juan De Chacarilla',
                   'Calle San Luis De Cáceres',
                   'Calle San Marco',
                   'Calle San Pablo',
                   'Calle San Pedro',
                   'Calle San Ramón',
                   'Calle San Silvestre',
                   'Calle Sandia',
                   'Calle Sandía',
                   'Calle Santa Barbara',
                   'Calle Santa Bárbara',
                   'Calle Santa Monica',
                   'Calle Santa Mónica',
                   'Calle Santa Rosa De Lima',
                   'Calle Santiago Ortiz',
                   'Calle Santo Corazón',
                   'Calle Sao',
                   'Calle Sara',
                   'Calle Sargento Emilio Calderón',
                   'Calle Sargento Leonardo Hernandez',
                   'Calle Sastre',
                   'Calle Saturnino Saucedo',
                   'Calle Seboi',
                   'Calle Seminario',
                   'Calle Senda',
                   'Calle Serere',
                   'Calle Sergio Roca Jimenez',
                   'Calle Severo Vásquez Machicado',
                   'Calle Sevigne',
                   'Calle Seyeyé',
                   'Calle Sorotoco',
                   'Calle Stig Ryden',
                   'Calle Subteniente Faustino Salvatierra',
                   'Calle Subteniente Luis Arce',
                   'Calle Sucre',
                   'Calle Sumuqué',
                   'Calle Tarbo',
                   'Calle Tucan',
                   'Calle Tulipanes',
                   'Calle Turuguapa',
                   'Calle Ulrico Schmidl',
                   'Calle Universo',
                   'Calle Urina',
                   'Calle Urucú',
                   'Calle Usuri',
                   'Calle Vallegrande',
                   'Calle Vasquez',
                   'Calle Vasquez Machicado',
                   'Calle Velasco',
                   'Calle Vells',
                   'Calle Venezuela',
                   'Calle Venus',
                   'Calle Villa Bella',
                   'Calle Walt Whitman',
                   'Calle Wanda Hancke',
                   'Calle Warnes',
                   'Calle Willy Bendek',
                   'Callelas Maras',
                   'Calletierra',
                   'Camatindi',
                   'Camba Pechí',
                   'Cambódromo',
                   'Camino A Montecristo',
                   'Cap. Humberto Salinas',
                   'Caracoles',
                   'Caranda',
                   'Carandaití',
                   'Caripui',
                   'Carlos Sickerle',
                   'Carmelo Pérez',
                   'Carnaval',
                   'Carretero',
                   'Casamonte',
                   'Casiano Vaca Pereira',
                   'Cayetano Méndez',
                   'Cañada El Carmen',
                   'Cañada Larga',
                   'Cañada Strongest',
                   'Cañaveral',
                   'Cbo. Enrique Nuñez',
                   'Cbo. Gonzalo Domínguez',
                   'Cbo. José Toledo',
                   'Chichapi',
                   'Chilón',
                   'Chinguri',
                   'Chiquitanita',
                   'Chiquitos',
                   'Chiriguanos',
                   'Chiriguanía',
                   'Chiturí',
                   'Choboreca',
                   'Chochís',
                   'Choreti',
                   'Chovena',
                   'Churia',
                   'Chuubi',
                   'Chuubi Este',
                   'Clara',
                   'Claudio Peñaranda',
                   'Claveles',
                   'Cnl. Antonio Vicente Peña',
                   'Cnl. Diego A. Ramírez',
                   'Cnl. Domingo Ávila',
                   'Cnl. Facundo Moreno',
                   'Cnl. Felix Romero',
                   'Cnl. Francisco B. Ibañez',
                   'Cnl. Gabino Ibañez',
                   'Cnl. Genaro Blacutt',
                   'Cnl. H. Suárez',
                   'Cnl. Humberto Wichtendahl',
                   'Cnl. Ignacio Castedo',
                   'Cnl. Juan Franco Román',
                   'Cnl. Manel María Franco',
                   'Cnl. Moisés Subirana',
                   'Cnl. Raúl Wichtendahl',
                   'Cnl. Roberto Cuéllar Salazar',
                   'Cnl. Tomás Antonio Suárez',
                   'Cobija',
                   'Cochabamba',
                   'Colectora',
                   'Colombia',
                   'Colosenses',
                   'Colpa',
                   'Combate Bahía',
                   'Concepción',
                   'Conrad',
                   'Convencionales',
                   'Copacabana',
                   'Copenhague',
                   'Cora Osuna De Frerking',
                   'Cordillera',
                   'Cordón Ecológico Río Piraí',
                   'Corindon',
                   'Corintios',
                   'Corpus Christi',
                   'Costa Rica',
                   'Crescencio León',
                   'Cristóbal Colón',
                   'Cristóbal Paniagua',
                   'Cruz Del Sur',
                   'Cslle 15 De Abril',
                   'Cslle 9',
                   'Cslle Rio Piripaini',
                   'Cuarto Anillo',
                   'Cuatro Ojos',
                   'Cuellar',
                   'Cuevo',
                   'Cunumicita',
                   'Cupesi',
                   'Diagonal 20',
                   'Diagonal 21',
                   'Diego De Mendoza',
                   'Dr Juan Justiniano',
                   'Dr. Adalberto Terceros M.',
                   'Dr. Adolfo Flores',
                   'Dr. Alejandro Casal',
                   'Dr. Angel M. De Aguirre',
                   'Dr. Antonio Vicente Barba',
                   'Dr. Antonio Álvarez Vaca',
                   'Dr. Aquino Rodríguez',
                   'Dr. Aquino Talavera',
                   'Dr. Darío Leigue Sanguino',
                   'Dr. Enrique Aponte C.',
                   'Dr. Ernesto Limpias',
                   'Dr. Ezequiel Justiniano',
                   'Dr. Fabián Vaca Chávez',
                   'Dr. Federico Rodriguez',
                   'Dr. Fernando Justiniano Ruiz',
                   'Dr. Gabriel Jose Moreno',
                   'Dr. Gabriel José Moreno',
                   'Dr. Germán Chávez Claros',
                   'Dr. Germán Landívar',
                   'Dr. Germán Zegarra',
                   'Dr. Gonzalo Cuéllar',
                   'Dr. Gregorio Balcázar',
                   'Dr. Heberto Añez',
                   'Dr. Horacio Sosa',
                   'Dr. Ismael Serrate',
                   'Dr. Jaime Román',
                   'Dr. José Antelo',
                   'Dr. José Justiniano',
                   'Dr. José León Justiniano',
                   'Dr. José Manuel Parada',
                   'Dr. José Santistevan S.',
                   'Dr. Juan Lorenzo Campero',
                   'Dr. Leonor Ribera Arteaga',
                   'Dr. Lucindo Rosado',
                   'Dr. Luis Saucedo A.',
                   'Dr. Luis Vicente M.',
                   'Dr. Maillerd P.',
                   'Dr. Manuel De La Vía',
                   'Dr. Manuel María Caballero',
                   'Dr. Mariano Zambrana Roca',
                   'Dr. Miguel Antelo Parada',
                   'Dr. Miguel Antonio Ruiz',
                   'Dr. Napoleón Gómez Landívar',
                   'Dr. Napoleón Rodriguez',
                   'Dr. Néstor J. Otazo',
                   'Dr. Pacífico Roca',
                   'Dr. Plácido Sánchez',
                   'Dr. Remberto Prado Montaño',
                   'Dr. Ricardo Arias',
                   'Dr. Rubén Terraza',
                   'Dr. Rómulo Herrera',
                   'Dr. Rómulo Lozada Quezada',
                   'Dr. Saúl Serrate',
                   'Dr. Sócrates Parada',
                   'Dr. Victor Salvatierra',
                   'Dr. Wálter Suárez L.',
                   'Dr. Álvaro Zalles',
                   'Dr. Ángel Mario Zambrana',
                   'Dra. María De Oliveira',
                   'Dámaso Alonso',
                   'Ebertein',
                   'Ecuador',
                   'Edmundo Roca',
                   'Eduardo Salazar',
                   'Efesios',
                   'Ejército Nacional',
                   'El Carmen',
                   'El Cedro',
                   'El Dorado',
                   'El Filo',
                   'El Fuerte',
                   'El Gomero',
                   'El Milán',
                   'El Nogal',
                   'El Palmar',
                   'El Pionero',
                   'El Salvador',
                   'El Siringuero',
                   'El Tajibo',
                   'El Torno',
                   'El Totaí',
                   'El Transnochador',
                   'El Trapiche',
                   'El Vagaso',
                   'Elena Salvatierra',
                   'Elvira De Mendoza',
                   'Elías Antelo',
                   'Emilio Cardona',
                   'Emilio Finot',
                   'Enconada',
                   'Enrique Finot',
                   'Esmeralda',
                   'España',
                   'Espejos',
                   'Estenssoro',
                   'Estevenson',
                   'Estonia',
                   'Estrada',
                   'Estrella',
                   'Eucalipto',
                   'Eucaliptos',
                   'F. Platanillos',
                   'Facundo Flores',
                   'Felix Bascopé',
                   'Fibra Camba',
                   'Fidel Oliva',
                   'Filadelfia',
                   'Final Isidro',
                   'Flavio Palma',
                   'Flor De Caña',
                   'Flora Salas',
                   'Florida',
                   'Fortin Corrales',
                   'Fortín Arce',
                   'Fortín Corrales',
                   'Fortín Toledo',
                   'Fr. Anselmo Schermeir',
                   'Francia',
                   'Francisca López',
                   'Guairu',
                   'Guajojó',
                   'Guapilo',
                   'Guapuru',
                   'Guapurú',
                   'Guaracachi',
                   'Guaraní',
                   'Guarapo',
                   'Guarayos',
                   'Guarey',
                   'Guayacán',
                   'Guerra Del Acre',
                   'Guillermo B. Rodrígez',
                   'Guyana',
                   'Gálatas',
                   'Génesis',
                   'Güendá',
                   'H. Roechmann',
                   'H. Salazar',
                   'Hardeman',
                   'Hebreos',
                   'Hechos De Los Apóstoles',
                   'Hermanas Gonzáles',
                   'Hermanos Adornos',
                   'Herminio Pedraza',
                   'Hernando Síles',
                   'Hernán Aldava Paz',
                   'Hernán Ardaya',
                   'Hernán Cuéllar',
                   'Hilandería',
                   'Horcones',
                   'Hugo Barranco',
                   'Hugo Wast (5 Este)',
                   'Hugo Wast (5 Oeste)',
                   'Héroes Del Chaco',
                   'Ichilo',
                   'Igmirí',
                   'Ignacia Zeballos',
                   'Ignacio Salvatierra',
                   'Incahuasi',
                   'Independencia',
                   'Ing. Ernesto Aponte',
                   'Ing. Miguel Tejada Velasco',
                   'Ingavi',
                   'Internacional',
                   'Internacional Panamericana',
                   'Invierno',
                   'Ipati',
                   'Ipitá',
                   'Isabel La Católica',
                   'Isaias',
                   'Isidoro Belzu',
                   'Isidro Ajata (Pasillo 1)',
                   'Itatines',
                   'J.B. Coímbra',
                   'J.M. Jordan',
                   'Jacaranda',
                   'Jacarandá',
                   'Jaime Mendoza',
                   'James Joyce',
                   'Jardineras',
                   'Jasmines',
                   'Jaurú',
                   'Jazmín',
                   'Jenecherú',
                   'Jenecherú / Jumechi',
                   'Jeremías',
                   'Jerusalen',
                   'Jerusalén',
                   'Jesús Lijerón R.',
                   'Jichituriqui',
                   'Jitapaqui',
                   'Jores',
                   'Jorge Flores Arias',
                   'Jorori',
                   'Josefina Bálsamo',
                   'José Luis Tejada Sorzano',
                   'José Manuel Aponte',
                   'José María Linares',
                   'José Peña Castellón',
                   'José Vicente Soliz',
                   'José Ávila',
                   'Juan Birch Minchin',
                   'Juan Carlos Tórrez',
                   'Juan De Urrutia',
                   'Juan José',
                   'Juan José Torrez',
                   'Juan Knez',
                   'Juan Latino',
                   'Juan Pablo II',
                   'Juana Alvis',
                   'Juana Azurduy',
                   'Juancito Pinto',
                   'Julio A. Gutierrez',
                   'Julio Salmón',
                   'Julio Verne',
                   'Jumechi',
                   'Justicia',
                   'Justo Yépez',
                   'Júpiter',
                   'K Este',
                   'Kennedy',
                   'La Amistad',
                   'La Bahía',
                   'La Bandarilla',
                   'La Bélgica',
                   'La Candelaria',
                   'La Cieguita',
                   'La Colina',
                   'La Estrella',
                   'La Gaiba',
                   'La Herradura',
                   'La Higuera',
                   'La Paz',
                   'La Perla',
                   'La Peña',
                   'La Plata (8 Este)',
                   'La Plata (8 Oeste)',
                   'La Rioja',
                   'La Riva',
                   'La Rosa',
                   'La Serena',
                   'La Tradición',
                   'La Troncal',
                   'Ladislao Cabrera',
                   'Laguna Orión',
                   'Lagunillas',
                   'Las Américas',
                   'Las Azucenas',
                   'Las Begonias',
                   'Las Chirimoyas',
                   'Las Dalias',
                   'Las Flores',
                   'Las Frutillas',
                   'Las Gardenias',
                   'Las Gramas',
                   'Las Leñas',
                   'Las Maras',
                   'Las Orquideas',
                   'Las Orquídeas',
                   'Las Palmas',
                   'Las Palmeras',
                   'Las Peras',
                   'Las Piñas',
                   'Las Roras',
                   'Las Rosas',
                   'Las Salinas',
                   'Las Vegas',
                   'Leda Rosa',
                   'Leocadia Ibañez',
                   'Libertad',
                   'Libertadores',
                   'Litoral',
                   'Lluvia De Oro',
                   'Los Alamos',
                   'Los Ambaibos',
                   'Los Angeles',
                   'Los Batos',
                   'Los Bibosis',
                   'Los Bosques',
                   'Los Cañones',
                   'Los Cedros',
                   'Los Ceibos',
                   'Los Chapeos',
                   'Los Claveles',
                   'Los Espinales',
                   'Los Flamboyanes',
                   'Los Gansos',
                   'Los Gomeros',
                   'Los Guapos',
                   'Los Jazmines',
                   'Los Lirios',
                   'Los Mangales',
                   'Los Monos',
                   'Los Nogales',
                   'Los Olivos',
                   'Los Pachíos',
                   'Los Paltos',
                   'Los Paraísos',
                   'Los Penocos',
                   'Los Pinos',
                   'Los Pitones',
                   'Los Robles',
                   'Los Rosales',
                   'Los Sauces',
                   'Los Tajibos',
                   'Los Taracoés',
                   'Los Totaíses',
                   'Los Troncos',
                   'Los Ángeles',
                   'Luciano Adorno',
                   'Lucuma',
                   'Lugones',
                   'Luis Darío Vásquez',
                   'Luis Don Malo',
                   'Luis Espinal',
                   'Lunita Camba',
                   'Luquillas',
                   'Lázaro De Ribera',
                   'M. De Los Santos Rivero',
                   'M. Ferrier',
                   'M. Montero',
                   'Machareti',
                   'Madrejón',
                   'Madrid',
                   'Madrinas De Guerra',
                   'Magdalena',
                   'Mairana',
                   'Manantial',
                   'Mandella Pecua',
                   'Mandioré',
                   'Mangabalito',
                   'Manomo',
                   'Manuel Güemes',
                   'Manuel Ignacio Salvatierra',
                   'Manuel Jesús Añez',
                   'Manuel Lazcano',
                   'Mara',
                   'Marañón',
                   'Marcelino Montero',
                   'Margarita',
                   'Mariano Durán Canelas',
                   'Mariano Telchi',
                   'La Troncal',
                   'Ladislao Cabrera',
                   'Laguna Orión',
                   'Lagunillas',
                   'Las Américas',
                   'Las Azucenas',
                   'Las Begonias',
                   'Las Chirimoyas',
                   'Las Dalias',
                   'Las Flores',
                   'Las Frutillas',
                   'Las Gardenias',
                   'Las Gramas',
                   'Las Leñas',
                   'Las Maras',
                   'Las Orquideas',
                   'Las Orquídeas',
                   'Las Palmas',
                   'Las Palmeras',
                   'Las Peras',
                   'Las Piñas',
                   'Las Roras',
                   'Las Rosas',
                   'Las Salinas',
                   'Las Vegas',
                   'Leda Rosa',
                   'Leocadia Ibañez',
                   'Libertad',
                   'Libertadores',
                   'Litoral',
                   'Lluvia De Oro',
                   'Los Alamos',
                   'Los Ambaibos',
                   'Los Angeles',
                   'Los Batos',
                   'Los Bibosis',
                   'Los Bosques',
                   'Los Cañones',
                   'Los Cedros',
                   'Los Ceibos',
                   'Los Chapeos',
                   'Los Claveles',
                   'Los Espinales',
                   'Los Flamboyanes',
                   'Los Gansos',
                   'Los Gomeros',
                   'Los Guapos',
                   'Los Jazmines',
                   'Los Lirios',
                   'Los Mangales',
                   'Los Monos',
                   'Los Nogales',
                   'Los Olivos',
                   'Los Pachíos',
                   'Los Paltos',
                   'Los Paraísos',
                   'Los Penocos',
                   'Los Pinos',
                   'Los Pitones',
                   'Los Robles',
                   'Los Rosales',
                   'Los Sauces',
                   'Los Tajibos',
                   'Los Taracoés',
                   'Los Totaíses',
                   'Los Troncos',
                   'Los Ángeles',
                   'Luciano Adorno',
                   'Lucuma',
                   'Lugones',
                   'Luis Darío Vásquez',
                   'Luis Don Malo',
                   'Luis Espinal',
                   'Lunita Camba',
                   'Luquillas',
                   'Lázaro De Ribera',
                   'M. De Los Santos Rivero',
                   'M. Ferrier',
                   'M. Montero',
                   'Machareti',
                   'Madrejón',
                   'Madrid',
                   'Madrinas De Guerra',
                   'Magdalena',
                   'Mairana',
                   'Manantial',
                   'Mandella Pecua',
                   'Mandioré',
                   'Mangabalito',
                   'Manomo',
                   'Manuel Güemes',
                   'Manuel Ignacio Salvatierra',
                   'Manuel Jesús Añez',
                   'Manuel Lazcano',
                   'Mara',
                   'Marañón',
                   'Marcelino Montero',
                   'Margarita',
                   'Mariano Durán Canelas',
                   'Mariano Telchi',
                   'Mario Flores',
                   'Marte',
                   'Maruama',
                   'Maruja',
                   'María Asunta',
                   'María Nazzarello',
                   'Masavi',
                   'Mataral',
                   'Mateo Fernández',
                   'Mateo Flores',
                   'Matico',
                   'Matías Franco',
                   'Max Fuss',
                   'Maúri',
                   'Medardo Chávez',
                   'Medio Oriente',
                   'Melao',
                   'Melaza',
                   'Melchor Rodríguez',
                   'Mendiola',
                   'Mercurio',
                   'Metropolitana',
                   'Miel De Caña',
                   'Mignon',
                   'Miguel Roca',
                   'Mineros',
                   'Mistoles',
                   'Mitimí',
                   'Mocapini',
                   'Moile',
                   'Moisés Subirana',
                   'Moldes',
                   'Monasterio Da Silva',
                   'Mons. Agustín Arce',
                   'Mons. Andrés Vergara Y Uribe',
                   'Mons. Fernando J. Pérez Y Oblitas',
                   'Mons. Francisco De Herboso Y Figueroa',
                   'Mons. Francisco De Padilla',
                   'Mons. Francisco J. Rodríguez',
                   'Mons. Jaime Mimbela',
                   'Mons. José M. Fernández De Córdova',
                   'Mons. Juan De Esturrizaga',
                   'Mons. Juan José Valdivia',
                   'Mons. Juan León De Los Ríos',
                   'Mons. Manuel N. De Rojas Y Argandoña',
                   'Mons. Miguel B. De La Fuente',
                   'Mons. Pedro De Cárdenas Y Arbieto',
                   'Monseñor O. Aguirre',
                   'Monseñor Salvatierra',
                   'Monterey',
                   'Morao',
                   'Moro Moro',
                   'Motacú',
                   'Motojobobo',
                   'Mousnier',
                   'Muchirí',
                   'Mundo',
                   'Muralto',
                   'Mutún',
                   'My. Benjamín Azcui',
                   'Máximo Durán',
                   'Máximo Melgar',
                   'México',
                   'Mónica Von Borries',
                   'Naicó',
                   'Nanawa',
                   'Napoleón Solares',
                   'Naranjal',
                   'Naranjil',
                   'Nataniel Aguirre',
                   'Nataniel García Chávez',
                   'Natividad Aguilera',
                   'Navidad',
                   'Nazaret',
                   'Neptuno',
                   'Nicanor Salvatierra',
                   'Nicolás Cuellar',
                   'Nicolás Ortiz',
                   'Nicolás Suárez',
                   'Niña Camba',
                   'Noel Kempff Mercado',
                   'Nor Chichas',
                   'Nor Lípez',
                   'Noveno Anillo',
                   'Nueno Delacueva',
                   'Nueva Asunción',
                   'Nueva Esperanza',
                   'Nueva Moca',
                   'Nueva Rioja',
                   'Numbite',
                   'Nuno De La Cueva',
                   'O. Cespedes',
                   'O. Ramírez',
                   'Oasis / Lagos',
                   'Obaí',
                   'Obispado',
                   'Ochoó',
                   'Oconi',
                   'Ocoró',
                   'Octavo Anillo',
                   'Oliden',
                   'Once Por Ciento',
                   'Onduline 1',
                   'Onduline 2',
                   'Onduline 3',
                   'Onduline 4',
                   'Onduline 5',
                   'Onix',
                   'Opalo',
                   'Oquitas',
                   'Oriente Petrolero',
                   'Orlando Rivero',
                   'Orquideas',
                   'Orquídeas',
                   'Oruro',
                   'Oslo',
                   'Otoño',
                   'Otuquis',
                   'Ovejerita',
                   'Pablo Asimani',
                   'Pablo Neruda',
                   'Pablo Picasso',
                   'Pablo Roca',
                   'Pablo Sanz',
                   'Pacaisito',
                   'Pachío',
                   'Pacífico',
                   'Padoba',
                   'Padre Adrián Melgar',
                   'Padre Agustín Castañares',
                   'Padre Antonio Gaspar',
                   'Padre Basiliano Landini',
                   'Padre Ceferino Mussani',
                   'Padre Cipriano Barace',
                   'Padre Diego Contreras',
                   'Padre Dionisio De Ávila',
                   'Padre Esteban Arroyo',
                   'Padre Felipe Suárez',
                   'Padre Francisco Amill',
                   'Padre Gaspar Campos',
                   'Padre Ignacio Chome',
                   'Padre Jaime Aguilar',
                   'Padre Joaquín De Velasco',
                   'Padre José Arce',
                   'Padre José Casas',
                   'Padre José Chueca',
                   'Padre José De Mata',
                   'Padre José Molina Campos',
                   'Padre José Ramón Hurtado',
                   'Padre José Vicente Durán',
                   'Padre Juan Felipe Vargas',
                   'Padre Juan Montenegro',
                   'Padre Pedro De La Roca',
                   'Padre Porres',
                   'Padre Pérez',
                   'Padre Roberto Melgar',
                   'Paitití',
                   'Palestina',
                   'Palmeras',
                   'Palmicruz',
                   'Palo María',
                   'Pampa',
                   'Pampa Grande',
                   'Pan De Arroz',
                   'Pananti',
                   'Pananti Masavi',
                   'Pananti Sur',
                   'Pando',
                   'Pantanal',
                   'Papayas',
                   'Paquió',
                   'Parabanó',
                   'Paraiso',
                   'Parapetí',
                   'Paraíso',
                   'Pari',
                   'Paris',
                   'Pasaje 1 Oeste',
                   'Pasaje 24 De Septiembre',
                   'Pasaje 5 Norte',
                   'Pasaje Beni',
                   'Pasaje Dalence',
                   'Pasaje Enrique Finot',
                   'Pasaje Giers',
                   'Pasaje Ingavi',
                   'Pasaje Jose Torrez',
                   'Pasaje Juan Oviendo De Quiñones',
                   'Pasaje Madre Selva',
                   'Pasaje Musuruquí',
                   'Pasaje Plaza',
                   'Pasaje Río Hondo',
                   'Pasaje San Lorenzo',
                   'Pasaje Victoria',
                   'Pasaje Yomomo',
                   'Pasillo',
                   'Pasillo 1',
                   'Pasillo 2',
                   'Pasillo 2 Cancha Polifuncional',
                   'Pasillo 3',
                   'Pasillo 3a',
                   'Pasillo 4',
                   'Pasillo 5b',
                   'Pasillo A',
                   'Pasillo Amboró',
                   'Pasillo B',
                   'Pasillo Bello',
                   'Pasillo Bruno',
                   'Pasillo Faisan',
                   'Pasillo Gaviota',
                   'Pasillo Landívar 1',
                   'Pasillo Las Maras',
                   'Pasillo Mercurio',
                   'Pasillo Militar',
                   'Pasillo Moscu',
                   'Pasillo Oscar Barbery',
                   'Pasillo Paredes',
                   'Pasillo Peji',
                   'Pasillo Tapiosi',
                   'Pasillo Tapiti',
                   'Passje El Cerro',
                   'Patujú',
                   'Paurito',
                   'Paúro',
                   'Pedro Cortéz',
                   'Pedro De Anzúrez',
                   'Pedro De Monroy',
                   'Pedro De Muñiz',
                   'Pedro Díez',
                   'Pedro II',
                   'Pedro Lorenzo',
                   'Pedro Rojas',
                   'Pedro Suárez Arana',
                   'Penoco',
                   'Penocos',
                   'Peralta',
                   'Percy Fawcett (3 Oeste)',
                   'Pero Vélez',
                   'Perotó',
                   'Peru',
                   'Picaflor',
                   'Picasso',
                   'Pichincha',
                   'Pico De Monte',
                   'Pin Pin',
                   'Pin Pin Este',
                   'Pinacas',
                   'Pino',
                   'Pinos',
                   'Pinto',
                   'Piococa',
                   'Piraimiri',
                   'Piramide',
                   'Piraícito',
                   'Pirita',
                   'Piriti',
                   'Pisagua',
                   'Pit Lane',
                   'Pitajaba',
                   'Pitón',
                   'Piyo',
                   'Pje. 10 De Agosto',
                   'Plasaje Plaza',
                   'Plaza Tarija',
                   'Plácido Méndez',
                   'Pocherema',
                   'Pocherena',
                   'Ponta Grossa',
                   'Popelina',
                   'Porongo',
                   'Portachuelo',
                   'Portugal',
                   'Postrervalle',
                   'Potosi',
                   'Pozo Del Tigre',
                   'Pozo Redondo',
                   'Primavera',
                   'Principal',
                   'Prof. Adriana Coímbra',
                   'Prof. Antonio Vicente Ardaya',
                   'Prof. Aquino Ibañez Soruco',
                   'Prof. Daría Castro',
                   'Prof. Elvira Ortiz De Chávez',
                   'Prof. Flavio Palma',
                   'Prof. Guido De Chazal',
                   'Prof. Ignacio Terán',
                   'Prof. José Antonio De Aguilera',
                   'Prof. José M. Nicanor Landívar',
                   'Prof. José Merino',
                   'Prof. Julia Barbery De Milina',
                   'Prof. Luis Escalante León',
                   'Prof. Mateo De Vargas',
                   'Prof. Maximiliano Arteaga',
                   'Prof. Rvdo. P. Manuel Jesús Lara',
                   'Prol. Warnes',
                   'Prolong. Avenida Beni',
                   'Prolongacion Las Liras',
                   'Prolongación Avenida Brasil',
                   'Prolongación Quijarro',
                   'Prospero Parada',
                   'Prudencio Vidal',
                   'Pucará',
                   'Raúl Otero Reich',
                   'Regalías',
                   'Remberto Gandarilla',
                   'Rey David',
                   'Rey De Reyes',
                   'Reyes Cardona',
                   'Riberalta',
                   'Ricardo Chávez',
                   'Richard Cushing',
                   'Rio Chuchio',
                   'Riquió',
                   'Rn4: Santa Cruz-Cotoca',
                   'Rn7: Doble Vía Santa Cruz-La Guardia',
                   'Roberto Barbery',
                   'Roberto Barbery Ibañez',
                   'Roberto Cuéllar',
                   'Roberto Fernandez',
                   'Río Nuevo',
                   'Río Piraipaní',
                   'Río Quimorí',
                   'Río Quiser',
                   'Río Totaitú',
                   'Río Ubaí',
                   'Río Urigayto',
                   'Río Verde',
                   'Rómulo Gómez',
                   'Sacramento',
                   'Saipina',
                   'Salatiel Suárez',
                   'Saldaña',
                   'Salida Hacia 4to Anillo',
                   'Salida Hacia 4to. Anillo',
                   'Salida Hacia 5to Anillo',
                   'Salida Hacia 6to Anillo',
                   'Salida Hacia Av. Grigota',
                   'Salida Hacia Av. Grigotá',
                   'Salida Hacia Rn7 Via La Guardia',
                   'Salmos',
                   'Salta',
                   'Salvador',
                   'Salvador Dalí',
                   'Samaipata',
                   'San Agustin',
                   'San Andres',
                   'San Andrés',
                   'San Antonio',
                   'San Carlos',
                   'San Diego',
                   'San Francisco',
                   'San Ignacio',
                   'San Isidro',
                   'San Javier',
                   'San Joaquín',
                   'San Jorge',
                   'San Jose',
                   'San José',
                   'San Juan',
                   'San Juan De Dios',
                   'San Juan Del Rosario',
                   'San Lorenzo',
                   'San Lucas',
                   'San Luis',
                   'San Luis De Cáceres',
                   'San Marco',
                   'San Marcos',
                   'San Martin',
                   'San Martín',
                   'San Mateo',
                   'San Matías',
                   'San Miguel',
                   'San Pablo',
                   'San Pedro',
                   'San Roque',
                   'San Sebastián',
                   'San Silvestre',
                   'Sanitario',
                   'Santa Ana',
                   'Santa Ana Este',
                   'Santa Cruz',
                   'Santa Fe',
                   'Santa Fé',
                   'Santa Isabel',
                   'Santa Lucía',
                   'Santa Maria',
                   'Santa María',
                   'Santa Rita',
                   'Santa Roba',
                   'Santa Rosa',
                   'Santiago',
                   'Santiago Sanguino',
                   'Santiago Vaca Guzmán',
                   'Santos Ortiz',
                   'Sapocó',
                   'Sararenda',
                   'Sarmiento',
                   'Saturnino Saucedo',
                   'Saturno',
                   'Sausalito',
                   'Sauzales',
                   'Sayubú',
                   'Saó',
                   'Sebastián Moza',
                   'Selva',
                   'Sendero Curichi La Madre',
                   'Seoane',
                   'Serere',
                   'Sevilla',
                   'Sexto Anillo',
                   'Señor De Los Milagros',
                   'Sgto. Hugo Wende C.',
                   'Sgto. Isaac Hurtado',
                   'Sgto. Manuel Bautista E.',
                   'Sgto. Mayor Diego Bazán',
                   'Sgto. Serafín Añez',
                   'Sgto. Zoilo Saavedra',
                   'Simón Bolivar',
                   'Simón Bolívar',
                   'Simón Álvarez',
                   'Sinaí',
                   'Sinini',
                   'Sirari',
                   'Siria',
                   'Sivingal',
                   'Smicht',
                   'Socorí',
                   'Sof Manuel El Hage',
                   'Sof. Ramón Parabá',
                   'Sold. Adolfo Alpire',
                   'Sold. Adolfo Cabrera',
                   'Sold. Adolfo Gutiérrez J.',
                   'Sold. Casto Quezada',
                   'Sold. Eduardo Barrios',
                   'Sold. Ignacio Anglarill',
                   'Sold. Manuel Alvarado',
                   'Sold. Marcos Bazán',
                   'Sold. Pascual Parapaino',
                   'Sold. Pedro Camargo',
                   'Sold. Percy Nurnberg Jordán',
                   'Sold. Santiago Arandia',
                   'Sombrero De Saó',
                   'Sor Estéfana Cámara',
                   'Soruco',
                   'Soruco Vargas',
                   'Soto',
                   'Sprinfiel',
                   'Stte. Belisario Callaú',
                   'Stte. Fidel Antelo',
                   'Stte. Francisco Carpio',
                   'Stte. Hernán Parejas R.',
                   'Stte. Héctor Pareja R.',
                   'Stte. Luis Camacho',
                   'Sucre',
                   'Sucumbé',
                   'Sumuqué',
                   'Surutú',
                   'Susano Azogue',
                   'Sutós',
                   'Suzano Azogue Rivero',
                   'Suárez De Figueroa',
                   'Séptimo Anillo',
                   'Tacna',
                   'Tacuaral',
                   'Tacurú',
                   'Tajibo',
                   'Tajibos',
                   'Tamarindo Seco',
                   'Taperas',
                   'Tapiosí',
                   'Taquirari',
                   'Tarapacá',
                   'Tarara',
                   'Tarija',
                   'Tartagal',
                   'Tatarenda',
                   'Tcnl. Celso Camacho',
                   'Tcnl. Miguel F. De Riglos',
                   'Tcnl. Zacarías Cuellar',
                   'Telmo Romero',
                   'Tembetary',
                   'Teodoro Sánchez',
                   'Tercer Anillo Externo',
                   'Tercer Anillo Interno',
                   'Terebinto',
                   'Terravista II',
                   'Tesalonicenses',
                   'Thomas Campbell',
                   'Tibibi Este',
                   'Tiguipa',
                   'Tiluchi',
                   'Tiluchi Este',
                   'Timoteo',
                   'Tiquiminiqui',
                   'Tirso De Molina',
                   'Tito Espinoza',
                   'Tobité',
                   'Toborochi',
                   'Tocomechi',
                   'Tocopilla',
                   'Togo',
                   'Toledo',
                   'Toledo Pimentel',
                   'Tomas De Lezo',
                   'Tomás Frías',
                   'Topacio',
                   'Topáter',
                   'Tordo Este',
                   'Torre López',
                   'Totai',
                   'Totaises',
                   'Totaí',
                   'Totaíces',
                   'Totaíses',
                   'Tres Cruces',
                   'Triana Este',
                   'Trigal',
                   'Trinidad',
                   'Tristán Roca',
                   'Tte. Hormando Balcazar',
                   'Tte. Humberto Román',
                   'Tte. Juan Humberto Rivero',
                   'Tte. Nataniel Aponte',
                   'Tte. Peña',
                   'Tte. Roca Peirano',
                   'Tte. Román Alderete',
                   'Tte. Rómulo Arteaga',
                   'Tte. Walter Vega',
                   'Tucavaca',
                   'Tucumán (6 Este)',
                   'Tucumán (6 Oeste)',
                   'Tumpa',
                   'Tumusla',
                   'Tundi',
                   'Tunás',
                   'Turquesa',
                   'Turubó',
                   'Tuyuyú',
                   'U. Católica',
                   'Uberaba',
                   'Universo',
                   'Urano',
                   'Urbano Franco',
                   'Urgel',
                   'Urkupiña',
                   'Urubichá',
                   'Urubó',
                   'Ururigua',
                   'Vadeo Del Rio Piraí',
                   'Vagabundos',
                   'Valencia',
                   'Valeriano Ortíz',
                   'Vanguardia',
                   'Velasco',
                   'Venezuela',
                   'Venus',
                   'Vera Cruz',
                   'Verano',
                   'Vista Bella',
                   'Vitupué',
                   'Viva Santa Cruz',
                   'Walt Whitman',
                   'Warnes',
                   'Wolframita',
                   'Yacuiba',
                   'Yacuses',
                   'Yaguarú',
                   'Yapacani',
                   'Yapiroa',
                   'Yerbabuena',
                   'Yesquero',
                   'Yoobi',
                   'Yotaú',
                   'Yuracaré',
                   'Zafiro',
                   'Zambrana',
                   'Zoilo Flores',
                   'Únzaga De La Vega'
        ];
    }
    public function dimension($array){
        return count($array);
    }   
    public function generar(){
        // Pruebalo aqui Eldy del futuro
        // return $this->arrayGetCalles();
        // cuantos barrios por distritos habran
        $cantidadBarriosDistritos = $this->arrayBarriosCantidad();
        // cuantas calles habran por barrio
        $cantidadCallesBarrios = $this->arrayCallesBarriosCantidad();




        $cantidadDistritos = count(Distrito::all());

        //dimension del array
        $arrayBarriosLength = count($cantidadBarriosDistritos);
        $arrayCalleLength = count($cantidadCallesBarrios);


        // total de barrios  sumas
        $cantidadBarrios = $this->cantidad($cantidadBarriosDistritos);
        $cantidadCalles = $this->cantidad($cantidadCallesBarrios);

        $barrios = $this->arrayBarrios();
        

        $calles = $this->arrayCalles();

        // array de arrays
        $barriosDistritos= $this->arrayTotal($arrayBarriosLength,$barrios,$cantidadBarriosDistritos);
        $callesBarrios = $this->arrayTotal($arrayCalleLength,$calles,$cantidadCallesBarrios);

        // return ["calles"=>$callesBarrios,"cantidad"=>$cantidadCalles,"length"=>count($callesBarrios)];
        return ["barrios"=>$barriosDistritos,"cantidad"=>$cantidadBarrios];
    }
    public function arrayGetBarrios(){
        return 
        [
            [
              "B/German Bush",
              "B/9 de octubre",
              "Z/ Alto San Pedro",
              "B/Chino",
              "B/Nueva Bolivia",
              "B/Las Vegas"
            ],
            [
              "B/11 de julio",
              "B/3 de Mayo",
              "B/1 de septiembre",
              "B/Evangelico",
              "B/Bolivar"
            ],
            [
              "B/11 de julio",
              "B/6 de agosto",
              "B/La antena",
              "B/Ricon del tigre",
              "B/La antena"
            ],
            [
              "B/1 de septiembre",
              "Estacion Argentina",
              "B/lindo",
              "B/Ricon del tigre",
              "B/Santa Cruz",
              "B/Norte"
            ],
            [
              "B/Nuevo Amanecer",
              "B/Virgen de Cotoca",
              "B/Evangelico",
              "B/Villa Real",
              "B/Millonarios",
              "B/Angel Sandoval",
              "B/Oruro"
            ],
            [
              "B/Marceliano",
              "B/3 de Mayo",
              "B/Nuevo Amanecer",
              "Pampa de la Isla",
              "B/11 de julio",
              "B/Tarija",
              "B/Villa Monte",
              "B/Villa Bella",
              "B/Guabira",
              "B/La antena"
            ],
            [
              "B/Oruro",
              "B/Evangelico",
              "Villa primero de mayo",
              "B/Santa Cruz",
              "B/Mercedes",
              "B/Mexico"
            ],
            [
              "B/Fe y Alegria",
              "B/Mandales",
              "B/1 de enero",
              "B/San Antonio"
            ],
            [
              "B/5 de agosto",
              "B/Mexico",
              "B/Evangelico",
              "B/1 de mayo",
              "B/Avaroa",
              "B/Mexico",
              "B/5 de agosto"
            ],
            [
              "B/6 de agosto",
              "B/Virgen de Cotoca",
              "B/11 de julio",
              "B/Santa Cruz"
            ],
            [
              "Z/Norte",
              "B/Ricon del tigre",
              "B/San Maximiliano",
              "B/La antena",
              "B/Mexico",
              "B/Equipetrol",
              "Villa primero de mayo",
              "Z/Norte"
            ],
            [
              "B/Villa Virginia",
              "B/2 de agosto",
              "B/Marceliano",
              "B/Abudabi",
              "B/Bolivar"
            ],
            [
              "B/Pampa grande",
              "B/Norte",
              "B/Angel Sandoval",
              "B/Urkupiña",
              "B/Urkupiña"
            ],
            [
              "Z/Sur",
              "B/Virgen de Cotoca",
              "B/Guabira",
              "B/9 de octubre",
              "Pampa de la Isla",
              "B/Daniel Ribero"
            ],
            [
              "Pampa de la Isla",
              "B/1 de mayo",
              "B/Villa Virginia",
              "B/Urkupiña",
              "B/Nueva Bolivia",
              "B/Pando",
              "B/Equipetrol"
            ],
            [
              "B/Las Vegas",
              "B/Villa Monte",
              "B/3 de agosto"
            ],
            [
              "B/Santa Cruz",
              "B/Avaroa",
              "B/Avaroa",
              "B/Castañeda",
              "B/Equipetrol",
              "B/Monasterio"
            ],
            [
              "B/Chino",
              "B/Rosa",
              "B/Millonarios",
              "B/6 de agosto"
            ],
            [
              "B/Pampa grande",
              "B/Argentino",
              "B/Bolivar",
              "B/Chino",
              "B/Guabira",
              "B/1 de septiembre",
              "B/Angel Sandoval"
            ],
            [
              "Z/ Alto San Pedro",
              "B/Angel Sandoval",
              "Villa primero de mayo",
              "B/Castañeda",
              "B/9 de octubre",
              "B/1 de mayo",
              "B/Guabira",
              "B/Argentino"
            ],
            [
              "Pampa de la Isla",
              "B/11 de julio",
              "B/German Bush",
              "B/Marceliano",
              "B/1 de enero"
            ],
            [
              "B/Guabira",
              "B/1 de septiembre",
              "B/Chino",
              "B/5 de septiembre",
              "B/Tarija"
            ],
            [
              "B/Pampa grande",
              "B/Venezuela",
              "B/Minero",
              "B/San Maximiliano",
              "B/11 de julio"
            ],
            [
              "B/1 de septiembre",
              "Z/ Alto San Pedro",
              "B/San Antonio",
              "B/Monasterio",
              "B/San Maximiliano",
              "B/Monasterio"
            ],
            [
              "B/San Antonio",
              "B/3 de Mayo",
              "B/Pampa grande",
              "B/Virgen de Cotoca",
              "B/1 de enero",
              "B/Colombia",
              "B/German Bush"
            ],
            [
              "B/Urkupiña",
              "B/2 de agosto",
              "B/Millonarios",
              "Z/Norte",
              "B/Villa Virginia",
              "B/Argentino",
              "B/Pampa de la madre",
              "B/1 de septiembre"
            ],
            [
              "B/Argentino",
              "B/2 de agosto",
              "B/Argentino",
              "B/Chino",
              "B/Avaroa",
              "B/Oruro"
            ],
            [
              "B/Warnes",
              "B/Argentino",
              "B/5 de agosto",
              "B/Colombia",
              "B/Avaroa",
              "B/Monasterio"
            ],
            [
              "B/San Maximiliano",
              "B/1 de septiembre",
              "B/1 de enero",
              "B/La antena",
              "B/Bolivar",
              "B/Aleman",
              "B/Abudabi"
            ],
            [
              "B/Monasterio",
              "B/Virgen de Cotoca",
              "B/Fe y Alegria",
              "Z/Norte"
            ],
            [
              "B/Chino",
              "B/Mandales",
              "B/9 de octubre",
              "B/Norte",
              "B/Fatima"
            ],
            [
              "Estacion Argentina",
              "B/Fe y Alegria",
              "B/La Cruz",
              "B/Fatima",
              "B/Pampa grande"
            ],
            [
              "B/9 de octubre",
              "B/Abudabi",
              "B/Fe y Alegria",
              "B/Oruro",
              "B/lindo"
            ],
            [
              "B/Villa Virginia",
              "B/Argentino",
              "B/Millonarios",
              "B/Evangelico",
              "B/5 de agosto",
              "Estacion Argentina"
            ],
            [
              "B/Fatima",
              "B/Avaroa",
              "B/Chino",
              "B/lindo",
              "B/Fe y Alegria",
              "B/La antena",
              "B/Tarija"
            ],
            [
              "B/La Cruz",
              "B/Fatima",
              "B/Evangelico"
            ],
            [
              "B/Fe y Alegria",
              "Pampa de la Isla",
              "B/Castañeda",
              "B/Mexico",
              "B/lindo",
              "B/Abudabi"
            ],
            [
              "Villa primero de mayo",
              "B/Tarija",
              "B/Marta Portugal",
              "B/Nuevo Santa Cruz"
            ],
            [
              "B/Fe y Alegria",
              "B/Avaroa",
              "B/Villa Monte",
              "B/Fatima",
              "B/San Maximiliano",
              "B/lindo",
              "B/6 de agosto"
            ],
            [
              "B/San Antonio",
              "B/lindo",
              "B/Santa Cruz",
              "B/Nuevo Amanecer",
              "B/Norte",
              "B/Pampa grande",
              "B/Ricon del tigre",
              "B/Norte",
              "B/Warnes"
            ],
            [
              "B/Mexico",
              "B/1 de mayo",
              "B/Virgen de Cotoca",
              "B/Pando",
              "Villa primero de mayo",
              "B/3 de Mayo",
              "B/Colombia",
              "B/Warnes"
            ],
            [
              "Z/ Alto San Pedro",
              "B/Villa Monte",
              "B/Urkupiña",
              "Estacion Argentina",
              "B/3 de Mayo"
            ],
            [
              "B/San Andres",
              "Pampa de la Isla",
              "B/Villa Real",
              "B/Virgen de Cotoca",
              "B/Pampa grande"
            ],
            [
              "B/Angel Sandoval",
              "B/Norte",
              "B/Villa Cochbamba",
              "B/Villa Cochbamba",
              "B/Tarija",
              "B/Aleman"
            ],
            [
              "B/lindo",
              "B/Abudabi",
              "B/5 de agosto",
              "B/6 de agosto",
              "B/Urkupiña",
              "B/Ricon del tigre",
              "B/Guadalupe"
            ],
            [
              "B/24 de septiembre",
              "B/1 de abril",
              "B/Pando"
            ],
            [
              "B/Pampa grande",
              "B/Evangelico",
              "B/Norte",
              "B/6 de agosto",
              "B/Nuevo Amanecer",
              "B/Tarija"
            ],
            [
              "B/Chino",
              "B/6 de agosto",
              "B/Aleman",
              "B/Las Vegas"
            ],
            [
              "B/3 de Mayo",
              "B/1 de enero",
              "Z/Sur",
              "B/3 de Mayo",
              "B/Angel Sandoval",
              "B/Villa Monte",
              "B/Nuevo Amanecer"
            ],
            [
              "B/Evangelico",
              "B/Nuevo Santa Cruz",
              "B/San Antonio",
              "B/11 de julio"
            ],
            [
              "B/Daniel Ribero",
              "B/Pampa grande",
              "B/Rosa",
              "B/Daniel Ribero",
              "B/Guabira",
              "B/German Bush",
              "B/Argentino"
            ],
            [
              "B/La Cruz",
              "B/Fatima",
              "B/Venezuela",
              "B/1 de abril",
              "B/La Cruz"
            ],
            [
              "B/Villa Virginia",
              "B/Marceliano",
              "B/Warnes",
              "B/Guabira",
              "B/Villa Virginia"
            ],
            [
              "B/Chino",
              "B/Nuevo Amanecer",
              "B/1 de enero",
              "B/Pampa de la madre",
              "B/Guadalupe",
              "B/Marceliano"
            ],
            [
              "B/Rosa",
              "B/Millonarios",
              "B/Avaroa",
              "B/1 de enero",
              "B/Santa Cruz",
              "B/San Antonio",
              "Pampa de la Isla"
            ],
            [
              "B/Chino",
              "B/1 de mayo",
              "B/Fe y Alegria",
              "B/2 de agosto",
              "B/Pando",
              "Estacion Argentina",
              "B/Nueva Bolivia"
            ],
            [
              "B/Angel Sandoval",
              "B/Oruro",
              "B/1 de septiembre",
              "B/Las Vegas",
              "B/Chino",
              "B/Abudabi"
            ],
            [
              "B/Nuevo Santa Cruz",
              "B/Villa Bella",
              "B/Villa Bella",
              "B/Villa Cochbamba"
            ],
            [
              "B/German Bush",
              "B/Marta Portugal",
              "B/La Cruz",
              "B/Nuevo Amanecer",
              "B/Minero",
              "B/Minero",
              "B/San Maximiliano"
            ],
            [
              "B/9 de octubre",
              "B/Mexico",
              "B/Urkupiña",
              "B/5 de agosto"
            ],
            [
              "B/Virgen de Fatima",
              "B/24 de septiembre",
              "B/Villa Real",
              "B/Oruro",
              "Pampa de la Isla"
            ],
            [
              "B/Evangelico",
              "B/Virgen de Fatima",
              "B/Argentino",
              "B/Chino",
              "B/San Maximiliano"
            ],
            [
              "B/Angel Sandoval",
              "B/9 de octubre",
              "B/Warnes",
              "B/German Bush",
              "B/Villa Bella"
            ],
            [
              "B/Pampa de la madre",
              "B/Virgen de Cotoca",
              "B/Norte",
              "B/Angel Sandoval",
              "B/Villa Virginia",
              "B/Monasterio"
            ],
            [
              "B/Nueva Bolivia",
              "B/Villa Monte",
              "B/Pampa de la madre",
              "B/Venezuela",
              "B/Venezuela",
              "B/Fatima",
              "B/Nueva Bolivia"
            ],
            [
              "B/Aleman",
              "B/Equipetrol",
              "B/Villa Bella",
              "B/Marceliano",
              "B/Nuevo Santa Cruz",
              "B/Guadalupe",
              "B/Daniel Ribero",
              "B/Marta Portugal",
              "B/Mandales",
              "Estacion Argentina"
            ],
            [
              "B/Millonarios",
              "B/1 de abril",
              "Z/ Alto San Pedro",
              "B/5 de agosto",
              "B/Equipetrol",
              "B/1 de mayo"
            ],
            [
              "B/Evangelico",
              "B/La antena",
              "B/Chino",
              "B/Chino"
            ],
            [
              "B/6 de agosto",
              "B/Argentino",
              "B/San Maximiliano",
              "B/Virgen de Cotoca",
              "B/Venezuela",
              "Villa primero de mayo",
              "B/lindo"
            ],
            [
              "B/Moitu",
              "B/Oruro",
              "B/Monasterio",
              "B/San Antonio"
            ],
            [
              "B/Fe y Alegria",
              "B/2 de agosto",
              "B/lindo",
              "B/Abudabi",
              "B/Tarija"
            ],
            [
              "B/Marta Portugal",
              "B/Abudabi",
              "B/Santa Cruz",
              "B/Angel Sandoval",
              "B/3 de Mayo"
            ],
            [
              "B/1 de abril",
              "B/1 de enero",
              "B/Rosa",
              "Pampa de la Isla",
              "B/Virgen de Cotoca",
              "B/5 de septiembre"
            ],
            [
              "B/Avaroa",
              "Estacion Argentina",
              "B/3 de agosto",
              "B/Bolivar",
              "Z/ Alto San Pedro",
              "B/Argentino"
            ],
            [
              "B/La antena",
              "B/Villa Real",
              "B/5 de septiembre",
              "B/Villa Cochbamba",
              "B/2 de agosto",
              "B/Evangelico",
              "B/Guadalupe"
            ],
            [
              "B/Equipetrol",
              "B/9 de octubre",
              "B/Aleman"
            ],
            [
              "B/9 de octubre",
              "B/lindo",
              "B/Chino",
              "B/3 de agosto",
              "B/Bolivar",
              "Estacion Argentina"
            ],
            [
              "B/Las Vegas",
              "B/Aleman",
              "B/9 de octubre",
              "B/Urkupiña"
            ],
            [
              "B/Aleman",
              "B/1 de mayo",
              "B/1 de mayo",
              "B/Guadalupe",
              "B/Minero",
              "B/5 de septiembre",
              "B/9 de octubre"
            ],
            [
              "B/Las Vegas",
              "B/Tarija",
              "B/Nuevo Santa Cruz",
              "B/Argentino",
              "B/lindo",
              "B/Marta Portugal"
            ],
            [
              "B/Millonarios",
              "B/Minero",
              "B/Santa Cruz",
              "B/Villa Cochbamba",
              "B/Millonarios"
            ],
            [
              "B/Millonarios",
              "B/Evangelico",
              "B/Mercedes",
              "B/Abudabi",
              "B/Equipetrol"
            ],
            [
              "Z/Sur",
              "B/2 de agosto",
              "B/Las Vegas",
              "B/San Andres",
              "B/2 de agosto",
              "B/Tarija",
              "Z/ Alto San Pedro"
            ],
            [
              "B/24 de septiembre",
              "B/Castañeda",
              "Villa primero de mayo",
              "B/Venezuela",
              "B/Guadalupe",
              "B/5 de septiembre"
            ],
            [
              "B/Minero",
              "B/Santa Cruz",
              "B/Guadalupe",
              "B/Norte",
              "Z/ Alto San Pedro",
              "B/Daniel Ribero",
              "B/Argentino"
            ],
            [
              "B/1 de enero",
              "B/Nuevo Santa Cruz",
              "B/San Antonio",
              "B/German Bush",
              "B/Pando"
            ],
            [
              "B/Venezuela",
              "B/Chino",
              "B/Tarija",
              "B/1 de abril",
              "B/Evangelico",
              "B/Monasterio"
            ],
            [
              "B/Evangelico",
              "B/Norte",
              "B/24 de septiembre",
              "B/Nuevo Santa Cruz"
            ],
            [
              "B/6 de agosto",
              "B/24 de septiembre",
              "B/Venezuela",
              "B/5 de agosto",
              "B/Abudabi",
              "B/Colombia",
              "Pampa de la Isla"
            ],
            [
              "B/1 de enero",
              "B/Mercedes",
              "B/lindo",
              "Villa primero de mayo"
            ],
            [
              "B/Villa Real",
              "B/Virgen de Fatima",
              "Estacion Argentina",
              "B/Santa Cruz",
              "B/Angel Sandoval",
              "B/Rosa"
            ],
            [
              "B/Colombia",
              "B/Equipetrol",
              "B/Virgen de Cotoca",
              "B/Nuevo Santa Cruz",
              "B/La Cruz"
            ],
            [
              "Pampa de la Isla",
              "B/Ricon del tigre",
              "B/Angel Sandoval",
              "B/Marceliano",
              "B/1 de enero"
            ],
            [
              "B/Evangelico",
              "B/Villa Bella",
              "B/Venezuela",
              "B/Chino",
              "B/9 de octubre",
              "B/1 de enero"
            ],
            [
              "B/Minero",
              "B/5 de septiembre",
              "B/German Bush",
              "B/Guabira",
              "B/La antena",
              "B/La Cruz",
              "B/Mercedes"
            ],
            [
              "B/Pampa de la madre",
              "B/German Bush",
              "B/Mandales",
              "B/San Maximiliano",
              "B/Ricon del tigre",
              "B/Marta Portugal",
              "Z/Sur"
            ],
            [
              "B/Villa Bella",
              "B/Norte",
              "B/Abudabi",
              "B/Pampa grande",
              "B/La antena",
              "B/Las Vegas"
            ],
            [
              "B/San Andres",
              "B/Nuevo Amanecer",
              "B/Nuevo Amanecer",
              "B/Pando"
            ],
            [
              "B/Colombia",
              "B/La antena",
              "B/Castañeda",
              "B/24 de septiembre",
              "B/Venezuela",
              "B/Abudabi",
              "B/Marceliano"
            ],
            [
              "Z/Norte",
              "B/Virgen de Fatima",
              "B/Ricon del tigre",
              "B/6 de agosto"
            ],
            [
              "B/Equipetrol",
              "B/Chino",
              "B/Tarija",
              "B/24 de septiembre",
              "B/Pando"
            ]
        ];
          
    }
    public function arrayGetCalles(){
       return Array1::ArrayCalles();
    }
    

    





    public function insertarDepartamentos(){
        
        $arrayDepartamento = $this->arrayDepartamentos();
        $departamentoLength =  count($arrayDepartamento);

        for ($i=0; $i < $departamentoLength; $i++) { 
            
            $departamento = new Departamento();
            $departamento->nombre = $arrayDepartamento[$i];
            $departamento->save();
        }

        return  $this->departamentos();
    }
    public function insertarProvincias(){

        $departamento_id = 1;
        $arrayProvincias = $this->arrayProvincias();
        $provinciaLength = count($arrayProvincias);

        for ($i=0; $i < $provinciaLength; $i++) { 
            $provincia = new Provincia();
            $provincia->nombre = $arrayProvincias[$i];
            $provincia->departamento_id = $departamento_id;
            $provincia->save(); 
        }

        return $this->provincias();
    } 
    public function insertearMunicipios(){

        $arrayMunicipios = $this->arrayMunicipios();

        $municipioLength = count($arrayMunicipios);

        for ($i=0; $i < $municipioLength; $i++) { 
            
            for ($j=0; $j < count($arrayMunicipios[$i]); $j++) { 
                $municipio = new Municipio();
                $municipio->nombre = $arrayMunicipios[$i][$j];
                $municipio->provincia_id = $i + 1;
                $municipio->save();
            }
        }
        return $municipio = Municipio::all();
    }
    public function insertarDistritos(){

        
        $arrayCantidadDistritos = $this->arrayDistritosCantidad();

        $provinciaLength = count(Provincia::all());
        for ($i=0; $i < $provinciaLength; $i++) { 
            for ($j=0; $j < $arrayCantidadDistritos[$i]; $j++) { 
                $distrito = new Distrito();
                $distrito->nombre = $j+1;
                $distrito->municipio_id = $i + 1;
                $distrito->save();
            }
        }
        $id =  101;
        DB::delete("delete from distritos where id > $id");
        return $this->distritos();
    }
    public function getCalles(){


        return [


        ];
    }
    public function getBarrioCalle($distrito){
        //array de barrios 
        $arrayBarrios = $this->arrayGetBarrios();

        // return $arrayBarrios;
        

        // return $this->arrayBarriosCantidad()[1];

        // sub Array
        $barrios = $arrayBarrios[$distrito-1];

        // numero entre el 0 y max del sub array
        $index = rand(0,(count($barrios)-1));  
        
        $contador = 0 ;



        // 0 101

        for ($i=0; $i < $distrito; $i++) { 
            if($distrito == ($i+1)){
                // [0,1,2,3,4,5]
                $contador = $contador + ($index+1);
            }else{
                $contador = $contador + $this->arrayBarriosCantidad()[$i];
            }
        }

        $x = rand(0,
        (count($this->arrayGetCalles()[$contador]))-1
        );

        return [
            "nombreCalle"=>$this->arrayGetCalles()[$contador][$x],
            "nombreBarrio" => $barrios[$index]
        ];

    }
    public function generarNombre(){
        
        $rand = rand(0,1);
        if($rand){
            $nombre = [ "nombre" => $this->arrayNombresFemeninos()[rand(0,(count($this->arrayNombresFemeninos())-1))] , "sexo"=>"femenino"];
        }else{
            $nombre = [ "nombre" => $this->arrayNombresMasculinos()[rand(0,(count($this->arrayNombresMasculinos())-1))] , "sexo"=>"masculino"];
        }

        return $nombre;

    }
    public function generarApellidos(){

        $paterno = $this->arrayPaternos()[rand(0,(count($this->arrayPaternos())-1))];
        $materno = $this->arrayPaternos()[rand(0,(count($this->arrayPaternos())-1))];
        $apellidos = $paterno ." ". $materno; 
        
        return [
            "apellidos" => $apellidos,
            "paterno"   => $paterno,
            "materno" => $materno
        ];
    }
    public function generarUsuario($nombre,$paterno,$materno){
        
        
        $numero1 = rand(0,10);
        $numero2 = rand(1,100);

        $length1 = strlen($paterno);
        $length2 = strlen($materno);
        $quitar1 = 2 - $length1;
        $quitar2 = 2 - $length2;
        $pat = substr($paterno,0,$quitar1);
        $mat = substr($materno,0,$quitar2);
        $concatenar =trim($nombre).$pat.$mat."$numero1"."$numero2";
        $name = strtolower($concatenar);

        $gmail = $name."@gmail.com";

        return ["name"=>$name,"email"=>$gmail];
    }
    public function generarFechaNacimiento(){
        $años = rand(5,60); 
        $dias = rand(1,365);

        // for ($i=0; $i < 100; $i++) { 
        //     array_push($numero,rand(5,60));
        // }
        $fechaActual = date("Y-m-d");

        // date("d-m-Y",strtotime($fecha_actual."+ 1 year"));

        $fecha_modificada = date("Y-m-d",strtotime($fechaActual."- $años year"));

        $fecha_nacimiento = date("Y-m-d",strtotime($fecha_modificada."- $dias days"));


        //  return $this->generarApellidos();
        return ["fecha"=>$fecha_nacimiento];
        // return $this->generarUsuario("Eldy","Arias","Cuellar");
    }
    public function insertarPacientes(){


        $formato = 'Y-m-d';
        
        $fechaCaso    = '2020-03-19';
        $numeroCasos = 2;
        $casos = "confirmados";

       
        $distrito = rand(1,(count(Distrito::all())));
       



        $BarrioCalle = $this->getBarrioCalle($distrito);
        
        for ($i=0; $i < $numeroCasos; $i++) { 

            $direccion = new Direccion();
            $direccion->barrio_zona = $BarrioCalle["nombreBarrio"];
            $direccion->avenida_calle = $BarrioCalle["nombreCalle"];
            $direccion->numero_domicilio = rand(1,9000);
            $direccion->distrito_id = $distrito;
            $direccion->save();

            $nombre = $this->generarNombre();
            $apellidos = $this->generarApellidos();
            $fecha = $this->generarFechaNacimiento();

            $persona = new Persona();
            $persona->nombre = $nombre["nombre"];
            $persona->apellidos = $apellidos["apellidos"];
            $persona->ci = (rand(5000000,9999999));
            $persona->fecha_nacimiento = $fecha["fecha"];
            $persona->telefono = (rand(60000000,79999999));
            $persona->nacionalidad = "Bolivia";
            $persona->sexo = $nombre["sexo"];
            $persona->direccion_id = $direccion->id;
            $persona->save();


            $usuario = $this->generarUsuario($persona->nombre,$apellidos["paterno"],$apellidos["materno"]);

            $user = new User();
            $user->id        = $persona->id;
            $user->name = $usuario["name"] ;
            $user->email = $usuario["email"];
            $user->password = Hash::make("23defebrero");
            if($persona->sexo=='hombre'){
                $user->avatar = 'imagenes/avatar-hombre.jpg';
            }else{
                $user->avatar = 'imagenes/avatar-mujer.png';
            }
            $user->save();

            $user->assignRole('paciente');

            $paciente =  new Paciente();
            $paciente->numero_seguro = rand(555555555,999999999);
            $paciente->id =  $user->id;
            $paciente->save();

            $caso = new Caso();
            $caso->fecha = $fechaCaso;
            $caso->estado = $casos;
            $caso->paciente_id = $paciente->id;
            $caso->save();


            

        }

        return $paciente=Paciente::all();

    }


    public function insertarMedicos(){

    }
    public function insertarHospitales(){

    }
    public function insertarEspecialidades(){

    }




    
    public function departamentos(){
        return Departamento::all();
    }
    public function provincias(){
        return Provincia::all();
    }
    public function municipios(){
        return Municipio::all();
    }
    public function distritos(){
        return Distrito::all();
    }


    public function cantidad($array){
        $resultado = 0;
        for ($i=0; $i < (count($array)) ; $i++) { 
            $resultado =$resultado + $array[$i];
        } 

        return $resultado;
    }
    public function arrayTotal($length,$arrayNombre,$arrayCantidad){
        $arrayResultado = [];
        for ($i=0; $i < $length; $i++) { 
            $barrio = [];
            for ($j=0; $j < $arrayCantidad[$i]; $j++) { 
                
                array_push($barrio,($arrayNombre[
                    rand(0,(count($arrayNombre)-1))
                ]
              )); 
            }
            array_push($arrayResultado,$barrio);
        }
        return $arrayResultado;
    }
    public function tipoExamenes(){
      

      $arrayExamenes = [
        'Examen A','Examen B', 'Examen C'
      ];

      $arrayDescripciones = [
        'sin descripcion',
        'sin descripcion',
        'sin descripcion'
      ];

      $count = count($arrayExamenes);
      
      for ($i=0; $i < $count; $i++) { 
        $tipo = new TipoExamen();
        $tipo->nombre = $arrayExamenes[$i];        
        $tipo->descripcion = $arrayDescripciones[$i];
        $tipo->save();        
      }

      return $tipo;
    }
}


//  migrar todo
// 1 php artisan migrate
// 2 php artisan db:seed
// 3 api/insertar/distritos
// 4 llenar arrayBarrios
// 5 llenar arrayCalles
// 6 api/genera 
// 7 api/genera 

// 8 llenar ArrayNobre M
// 9 llenar ArrayNobre F
// 10 apeliidos P
// 11 apeliidos M
// 12 api/pacientes



