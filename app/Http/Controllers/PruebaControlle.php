<?php

namespace App\Http\Controllers;

use App\Caso;
use App\HistorialMedico;
use App\Consulta;
use App\Direccion;
use App\Distrito;
use App\Examen;
use App\Medico;
use App\Paciente;
use App\Persona;
use App\Provincia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PruebaControlle extends Controller
{
    public function prueba(){
        
        
        
        // $idMedico = Auth::id();
        // return $idMedico;
        
        $paciente = 9;
        $medico = 2;
        
        $consulta = DB::select("SELECT pacientes.id as paciente_id,
                                    medicos.id as medico_id,
                                    consultas.motivo_consulta,
                                    consultas.fecha_consulta,
                                    consultas.fecha_programada,
                                    consultas.hora_programada
                              FROM  pacientes,
                                    medicos,
                                    consultas
                              WHERE consultas.paciente_id = pacientes.id AND 
                                    consultas.medico_id =  medicos.id AND 
                                    pacientes.id = $paciente AND
                                    medicos.id = $medico 
                                    
                              ");

        $datosMedico = DB::select("SELECT personas.nombre ,
                                         personas.apellidos
                                  FROM medicos,
                                       personas,
                                       hospitales 
                                  WHERE medicos.id = personas.id AND 
                                        hospitales.id = medicos.hospital_id AND
                                        medicos.id = $medico
                                  ");      
                                  
        $datosPaciente = DB::select("SELECT  nombre,
                                                apellidos,
                                                ci,
                                                telefono,
                                                nacionalidad,
                                                fecha_nacimiento,
                                                sexo,
                                                direccion_id
                                        FROM pacientes, personas 
                                        WHERE pacientes.id = personas.id AND 
                                        pacientes.id = $paciente
                                        "); 
        
        $datosHospital = DB::select("SELECT  nombre,
                                        imagen,
                                        nivel,
                                        telefono,
                                        direccion_id
                                FROM  hospitales,medicos
                                WHERE medicos.hospital_id = hospitales.id AND
                                      medicos.id = $medico
                                ");                                   
        
        
        // $historialPaciente = DB::select(" SELECT 
        //                                   FROM 
        //                                   WHERE
        //                                 ");      

        return 
              [
                "consulta"   =>  $consulta,
                "medico"     =>  $datosMedico,
                "paciente"   =>  $datosPaciente,
                "hospital"   =>  $datosHospital
              ];
        // $hospital_id =1;

        
        // return [
        //     "medicos" => $medico_hospital,
        //     "arrayMedico" => $arraymedico,
        //     "lengthMedico" => $lengthmedico,
        //     "indexMedico"=> $indexMedico,
        //     "medico_id"=> $medico_id
        // ];

    
        // return $medico_hospital;

        //  return $arrayhospital;

        // $array = [];

        // $distritos = DB::select("SELECT distritos.id FROM distritos,municipios WHERE distritos.municipio_id = municipios.id AND municipios.id = 1" );
        // foreach ($distritos as $key => $value) {
        //     array_push($array,$value->id);
        // }

        $id = 3;

        $consultasPaciente = DB::select("SELECT 
        consultas.id,
        consultas.fecha_programada,
        consultas.hora_consulta,
        consultas.fecha_consulta,
        consultas.estado_consulta,
        consultas.motivo_consulta
        
        FROM consultas,medicos,pacientes 
        WHERE consultas.medico_id = medicos.id 
        AND consultas.paciente_id =  pacientes.id
        AND pacientes.id = $id");
        
        return $consultasPaciente;
            return 
            // view('prueba',
            // [   
                // "array2" =>
                $consultasPaciente;
            
            // ]);






        // return view('prueba',[
        //     'array' => $distritos
        // ]);
        // $paciente_id = 3;
        // $consultas= Consulta::join('examenes','examenes.consulta_id','consultas.id')
        // ->join('pacientes','pacientes.id','=','consultas.paciente_id')->where('pacientes.id','=',$paciente_id)->get();

        // return $consultas;
        // $id = 3; 
        // $direccion = DB::select("SELECT  
        // departamentos.nombre as departamento,
        // provincias.nombre as provincia,
        // municipios.nombre as municipio,
        // distritos.nombre as distrito,
        // direcciones.avenida_calle,
        // direcciones.barrio_zona,
        // direcciones.numero_domicilio
        // FROM departamentos,provincias,municipios,distritos,direcciones ,personas 
        // WHERE departamentos.id = provincias.departamento_id AND
        // provincias.id = municipios.provincia_id AND 
        // municipios.id = distritos.municipio_id AND
        // distritos.id = direcciones.distrito_id AND
        // direcciones.id = personas.direccion_id AND
        // personas.id = $id
        // ");


        // return $direccion;
        // $persona = Persona::where('personas.id','=',3)->get();
        // return $persona;
        // $persona = Persona::where('personas.id','=',$user->id);
        // return $persona;
        // return "funciona";

        // $infectados = Caso::where('estado','=','confirmados')->get();

        // return count($infectados);
    }
    public function insertarPacientes(){


        $formato = 'Y-m-d';
        
        $fechaCaso    = '2020-03-19';
        $numeroCasos = 2;
        $internados = "si";
        $casos = "confirmado";

        
       
        $distrito = rand(1,(count(Distrito::all())));
       



        $BarrioCalle = $this->getBarrioCalle($distrito);
        

        for ($i=0; $i < $numeroCasos; $i++) { 


            if($casos=='confirmado' || $casos == 'sospechoso'){


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

                if($casos == 'confirmado'){
                    $motivo = ['covid-examen','resultado-examen'];
                    $countMotivo = count($motivo);
                    $arrayHoraProgramada = [
                        '09:00:00',
                        '09:30:00',
                        '10:00:07',
                        '10:30:00',
                        '11:07:00',
                        '11:30:00',
                        '14:00:00',
                        '14:30:00',
                        '15:00:00',
                        '15:30:00',
                        '15:00:00',
                        '15:30:00',
                        '17:00:00',
                        '17:30:00',
                        '18:00:00'
                    ];


                    // municipio del paciente

                    $municipio_paciente = DB::select("SELECT municipios.id 
                    FROM municipios,distritos,personas,direcciones 
                    WHERE municipios.id = distritos.municipio_id AND
                          direcciones.distrito_id = distritos.id AND
                          personas.direccion_id = direcciones.id AND 
                          personas.id = $paciente->id
                     ");
                    //guardado aqui
                    $idmunicipio = $municipio_paciente[0]->id;


                    //hospitales en ese municipio 
                    $hospitales = DB::select("SELECT hospitales.id FROM  hospitales ,direcciones,distritos, municipios WHERE 
                        hospitales.direccion_id = direcciones.id AND direcciones.distrito_id = distritos.id AND 
                        municipios.id = distritos.municipio_id
                        AND municipios.id =  $idmunicipio");

                    // seteados en este array
                    $arrayhospital = []; 
                    foreach ($hospitales as $key => $value) {
                        array_push($arrayhospital,$value->id);
                    }
                    //dimencion del array de hospital
                    $lengthhospital = count($arrayhospital);
                    //elegimos un hospital

                    $lengthhospital =$lengthhospital-1;

                    $elegirhospital = rand(0,$lengthhospital);
                    //guardmos el id del hospital elegido
                    $hospital_id = $arrayhospital[$elegirhospital];
                    



                    //Medicos del hospital seleccionado
                    $medico_hospital = Medico::join('hospitales','hospitales.id','medicos.hospital_id')->join('personas','personas.id','medicos.id')
                    ->select('medicos.id as medico_id')
                    ->where('medicos.hospital_id','=',$hospital_id)->get();

                    $arraymedico = [];
                    foreach ($medico_hospital as $key => $value) {
                        array_push($arraymedico,$value->medico_id);
                    }

                    $lengthmedico = count($arraymedico);
                    $lengthmedico = $lengthmedico - 1;
                    $indexMedico = rand(0,$lengthmedico);

                    //medico seleccionado
                    $medico_id = $arraymedico[$indexMedico];



                     

                    $lengthhora = count($arrayHoraProgramada);
                    $lengthhora = $lengthhora - 1;
                    $indexHora = rand(0,$lengthhora);





                    for ($i=0; $i < $countMotivo; $i++) { 
                        
                        if($i == 0){
                            $consulta = new Consulta();
                            $consulta->estado_consulta = 2;
                            $consulta->motivo->consulta = $motivo[$i];
                            $consulta->fecha_consulta   = date("Y-m-d",strtotime($fechaCaso."- 6 days"));
                            $consulta->fecha_programada = date("Y-m-d",strtotime($fechaCaso."- 3 days"));
                            $consulta->hora_programada  = $arrayHoraProgramada[$indexHora]; 
                            $consulta->paciente_id = $paciente->id;
                            $consulta->medico_id = $medico_id;
                            $consulta->save();



                        }else{
                            $consulta = new Consulta();
                            $consulta->estado_consulta = 2;
                            $consulta->motivo->consulta = $motivo[$i];
                            $consulta->fecha_consulta   = date("Y-m-d",strtotime($fechaCaso."- 3 days"));
                            $consulta->fecha_programada = $fechaCaso;
                            $consulta->hora_programada  = $arrayHoraProgramada[$indexHora]; 
                            $consulta->paciente_id = $paciente->id;
                            $consulta->medico_id = $medico_id;
                            $consulta->save();
                        }
                    }
                }


                   

                // $table->integer('estado_consulta')->default(1);
                // // $table->string('evolucion_enfermedad');
                // $table->string('motivo_consulta');
    
                // $table->date('fecha_consulta');
                // $table->date('fecha_programada');
                // $table->time('hora_programada');
    

                // $table->integer('paciente_id')->unsigned();
                // $table->integer('medico_id')->unsigned();
    
                // $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
                // $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
                // // $table->foreign('historial_id')->references('id')->on('historiales_medicos')->onDelete('cascade');
                // $table->timestamps();


                $examenes = new Examen();


            }

            
        }
        

        return $paciente=Paciente::all();

    }



    

}
