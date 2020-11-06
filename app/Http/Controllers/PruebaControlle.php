<?php

namespace App\Http\Controllers;

use App\Caso;
use App\HistorialMedico;
use App\Consulta;
use App\Diagnostico;
use App\Direccion;
use App\Distrito;
use App\Especialidad;
use App\Examen;
use App\Hospital;
use App\MedicamentoTratamiento;
use App\Medico;
use App\Paciente;
use App\PacienteTratamiento;
use App\PDF;
use App\Persona;
use App\Prescripcion;
use App\Provincia;
use App\Seguimiento;
use App\SeguimientoRegistro;
use App\TipoExamen;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PruebaControlle extends Controller
{
    public function prueba(){

        $paciente_id = 3;
        $medico_id = 2;
        $consultas = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
        ->join('medicos','medicos.id','=','consultas.medico_id')
        ->where('pacientes.id','=', $paciente_id)->where('medicos.id','=',$medico_id)->get(); 
        return $consultas;


        $caso = 'desesos';
        $id = 4;
        $fecha = date('Y-m-d');
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
                ->join('personas','personas.id','=','pacientes.id')
                ->join('direcciones','direcciones.id','=','personas.direccion_id')
                ->join('distritos','distritos.id','=','direcciones.distrito_id')
                ->join('municipios','municipios.id','=','distritos.municipio_id')
                ->join('provincias','provincias.id','=','municipios.provincia_id')
                ->select( 'casos.estado',
                        'casos.fecha',
                        'personas.nombre',
                        'personas.apellidos',
                        'direcciones.avenida_calle',
                        'distritos.nombre as distrito',
                        'municipios.nombre as municipio',
                        'provincias.nombre as provincia'
                        )
                ->where('provincias.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        
            $count = count($query);
        return $count;
 


        $caso ='confirmados';
        $id = 3;
        $fecha = date('Y-m-d');
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
                ->join('personas','personas.id','=','pacientes.id')
                ->join('direcciones','direcciones.id','=','personas.direccion_id')
                ->join('distritos','distritos.id','=','direcciones.distrito_id')
                ->join('municipios','municipios.id','=','distritos.municipio_id')
                ->join('provincias','provincias.id','=','municipios.provincia_id')
                ->select( 'casos.estado',
                        'casos.fecha',
                        'personas.nombre',
                        'personas.apellidos',
                        'direcciones.avenida_calle',
                        'distritos.nombre as distrito',
                        'municipios.nombre as municipio',
                        'provincias.nombre as provincia'
                        )
                ->where('provincias.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        
        return $query;

        $fecha = date('Y-m-d');
        return $fecha;
        $estado ='sospechosos';
        $hoy = date('Y-m-d');
        $casos = Caso::where('estado','=',$estado)
        ->where('fecha','=',$hoy)
        ->get();


        return count($casos);
        $caso ='confirmados';
        $id = 3;
        $fecha = date('Y-m-d');
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
                ->join('personas','personas.id','=','pacientes.id')
                ->join('direcciones','direcciones.id','=','personas.direccion_id')
                ->join('distritos','distritos.id','=','direcciones.distrito_id')
                ->join('municipios','municipios.id','=','distritos.municipio_id')
                ->join('provincias','provincias.id','=','municipios.provincia_id')
                ->select( 'casos.estado',
                        'casos.fecha',
                        'personas.nombre',
                        'personas.apellidos',
                        'direcciones.avenida_calle',
                        'distritos.nombre as distrito',
                        'municipios.nombre as municipio',
                        'provincias.nombre as provincia'
                        )
                ->where('provincias.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        
            $count = count($query);

        return $count;

        $id =1;
        $caso ='confirmados';

        $fecha = date('Y-m-d');
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
                ->join('personas','personas.id','=','pacientes.id')
                ->join('direcciones','direcciones.id','=','personas.direccion_id')
                ->join('distritos','distritos.id','=','direcciones.distrito_id')
                ->join('municipios','municipios.id','=','distritos.municipio_id')
                ->join('provincias','provincias.id','=','municipios.provincia_id')
                ->select( 'casos.estado',
                        'casos.fecha',
                        'personas.nombre',
                        'personas.apellidos',
                        'direcciones.avenida_calle',
                        'distritos.nombre as distrito',
                        'municipios.nombre as municipio',
                        'provincias.nombre as provincia'
                        )
                ->where('provincias.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        $count = count($query);
        return $count;

        $seguimiento = Seguimiento::where('paciente_tratamiento_id','=',1)->get();
        return $seguimiento[0]->id;


        $tratamiento = PacienteTratamiento::join('pacientes','pacientes.id','=','paciente_tratamiento.paciente_id')
        ->join('tratamientos','tratamientos.id','=','paciente_tratamiento.tratamiento_id')
        ->select(
            "tratamientos.id",
            "fecha",
            "dias",
            "tratamiento_id",
            "paciente_id",
            "estado",
            "internado",
            "caso",
            "numero_seguro",
            "nombre",
            "paciente_tratamiento.id as paciente_tratamiento_id"
        )
        ->where('pacientes.id','=',3)->get();

        return $tratamiento;

        $seguimiento_id = 1;

        $registroSeguimiento = SeguimientoRegistro::where('seguimiento_id','=',$seguimiento_id)->get();
        return $registroSeguimiento;
        

        $paciente_id = 5;

        $tratamiento = PacienteTratamiento::join('pacientes','pacientes.id','=','paciente_tratamiento.paciente_id')
        ->join('tratamientos','tratamientos.id','=','paciente_tratamiento.tratamiento_id')
        ->where('pacientes.id','=',$paciente_id)->get();

        return $tratamiento;


        $paciente_id = 4;
        $sw= false;
        $paciente_tratamiento = PacienteTratamiento::where('paciente_id','=',$paciente_id)
        ->where('estado','=',1)->get();

        $count = count($paciente_tratamiento);

        if($count){
            $sw = true;
        }


        return [
            'resultado '=>$sw
        ];


        $tratamiento_id =1;

        $detalle = MedicamentoTratamiento::join('tratamientos',
                                                'tratamientos.id','=','medicamento_tratamiento.tratamiento_id')
                                           ->join('medicamentos',
                                                'medicamentos.id','=','medicamento_tratamiento.medicamento_id')
                                           ->select('medicamento_tratamiento.indicaciones as indicacion',
                                                    'medicamento_tratamiento.cantidad',
                                                    'medicamentos.nombre as medicamento'
                                            )->where('medicamento_tratamiento.tratamiento_id','=',$tratamiento_id)->get();
                                        

        return $detalle;
        









        $id = 3 ;
        $caso = 'confirmados';


        $fecha = date('Y-m-d');
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
                ->join('personas','personas.id','=','pacientes.id')
                ->join('direcciones','direcciones.id','=','personas.direccion_id')
                ->join('distritos','distritos.id','=','direcciones.distrito_id')
                ->join('municipios','municipios.id','=','distritos.municipio_id')
                ->join('provincias','provincias.id','=','municipios.provincia_id')
                ->select( 'casos.estado',
                        'casos.fecha',
                        'personas.nombre',
                        'personas.apellidos',
                        'direcciones.avenida_calle',
                        'distritos.nombre as distrito',
                        'municipios.nombre as municipio',
                        'provincias.nombre as provincia'
                        )
                ->where('municipios.id','=',$id)
                ->where('casos.estado','=',$caso)
                ->where('casos.fecha','=',$fecha)
            ->get();
        $count = count($query);
        return $count;

        $provincias = Provincia::all();
        $arrayProvincia=[];
        foreach ($provincias as $key => $provincia) {
            array_push($arrayProvincia,$provincia->nombre);
        }

        return $arrayProvincia;





        $covid = Caso::where('estado','=','confirmados')->get();
        return $covid;


        $tipo = ['Examen A','Examen B'];
        $descripcion = ['Examen de Covid-19','Prueba Covid-19'];
        for ($i=0; $i < 2; $i++) { 
            $tipoExamen = new TipoExamen();
            $tipoExamen->nombre = $tipo[$i];
            $tipoExamen->descripcion = $descripcion[$i];
            $tipoExamen->save();
        }

        $id = 3; 

        $historial = Paciente::join('consultas','consultas.paciente_id','=','pacientes.id')
        ->join('medicos','medicos.id','=','consultas.medico_id')
        ->join('examenes','examenes.consulta_id','=','consultas.id')
        ->join('tipo_examen','tipo_examen.id','=','examenes.tipo_id')
        ->select('pacientes.id as paciente_id','pacientes.numero_seguro','consultas.id as consulta_id',
                 'consultas.fecha_registrada','consultas.fecha_programada','examenes.fecha_realizado as fecha_examen','examenes.fecha_resultado',
                 'examenes.resultado','tipo_examen.nombre as examen'
        )
        ->where('pacientes.id','=',$id)->get();

        return $historial;



        $diagnostico = Diagnostico::findOrFail(1);
        $consulta = Consulta::findOrFail($diagnostico->consulta_id);
        $paciente = Paciente::findOrFail($consulta->paciente_id);
        $personaPaciente  = Persona::findOrFail($paciente->id);
        $medico = Medico::findOrFail($consulta->medico_id);
        $personaMedico  = Persona::findOrFail($medico->id);
        $hospital = Hospital::findOrFail($medico->hospital_id);
        $especialidad = Especialidad::findOrFail($medico->especialidad_id);

        return [
            "diagnostico" => $diagnostico,
            "consulta"  => $consulta,
            "paciente"  => $paciente,
            "personaPaciente"  => $personaPaciente,
            "medico"  => $medico,
            "personaMedico"  => $personaMedico,
            "hospital" => $hospital,
            "especialidad" => $especialidad
        ];
        

        $diagnostico = Diagnostico::join('consultas','consultas.id','=','diagnosticos.consulta_id')
        ->where('diagnosticos.consulta_id','=',1)->get();

        return $diagnostico;

        $tipoExamen="Examen A";

        

        $tipoExamen = TipoExamen::where('nombre','=',$tipoExamen)->get();
        $tipo_id = $tipoExamen[0]->id;

        return $tipo_id;

        $id =  Auth::id();

        $paciente = Consulta::join('pacientes','pacientes.id','=','consultas.paciente_id')
            ->join('medicos','medicos.id','=','consultas.medico_id')
            ->where('medicos.id','=',$id)
            ->distinct()->paginate(10);

        return $paciente;


        
        // nombre de un paciente de una determinada consulta medica;
        $consulta = 2;
        $consulta = Consulta::findOrFail($consulta);

        $paciente_id = $consulta->paciente_id;
        $paciente =  Persona::findOrFail($paciente_id);
        $nombre = $paciente->nombre;
        $apellidos = $paciente->apellidos;
        $nombreCompleto = $nombre .' '.$apellidos;
        return $nombreCompleto;



        //id de un examen medico
        $item_id = 'Examen A';
        $query = TipoExamen::select('id')->where('nombre','=',$item_id)->get();
        $this->tipoExamen = $query[0]->id;

        return $query;

        $paciente_id = 3;


        //Todos los examenes medicos

        $examen = TipoExamen::join('examenes','examenes.tipo_id','=','tipo_examen.id')
                              ->join('consultas','consultas.id','=','examenes.consulta_id')
                              ->join('pacientes','pacientes.id','=','consultas.paciente_id')
                              ->join('personas','personas.id','=','pacientes.id')
                              ->select('personas.nombre',
                                       'personas.apellidos',
                                       'tipo_examen.nombre as tipo_examen',
                                       'examenes.fecha_realizado',
                                       'examenes.estado',
                                       'examenes.resultado'
                                       )
                             ->where('pacientes.id','=',$paciente_id)
        ->get();

        return $examen;


        $paciente_id = 154;
        $historial = HistorialMedico::join('pacientes','pacientes.id','=','historiales_medicos.paciente_id')
        ->where('pacientes.id','=',$paciente_id)
        ->get();
        return $historial;

        $provincia_id = 1;

        $confirmados = PDF::provinciaCasos($provincia_id,'confirmados');
        return $confirmados;

        $paciente = Caso::join('pacientes','pacientes.id','casos.paciente_id')
        ->join('personas','personas.id'      ,'=','pacientes.id')
        ->join('direcciones','direcciones.id','=','personas.direccion_id')
        ->join('distritos','distritos.id'    ,'=','direcciones.distrito_id')
        ->join('municipios','municipios.id'  ,'=','distritos.municipio_id')
        ->join('provincias','provincias.id'  ,'=','municipios.provincia_id')
        ->select( 'casos.estado',
                  'personas.nombre',
                  'personas.apellidos',
                  'direcciones.avenida_calle',
                  'distritos.nombre as distrito',
                  'municipios.nombre as municipio',
                  'provincias.nombre as provincia'
                  )
        ->where('provincias.id','=',$provincia_id)
        ->where('casos.estado','=','confirmados')
        ->get();

        return $paciente;


        $fecha = '2020-10-01';
        $distrito = 1;

        $paciente = Caso::join('pacientes','pacientes.id','casos.paciente_id')
        ->join('personas','personas.id','=','pacientes.id')
        ->join('direcciones','direcciones.id','=','personas.direccion_id')
        ->join('distritos','distritos.id','=','direcciones.distrito_id')
        ->join('municipios','municipios.id','=','distritos.municipio_id')
        ->join('provincias','provincias.id','=','municipios.provincia_id')
        ->select( 'casos.estado',
                  'personas.nombre',
                  'direcciones.avenida_calle',
                  'distritos.nombre as distrito',
                  'municipios.nombre as municipio',
                  'provincias.nombre as provincia'
                  
                  )
        ->where('casos.estado','=','desedos')
        ->where('casos.fecha','=',$fecha)
        ->get();

        return $paciente;

        $caso = 'confirmados';
        $provincia_id = 1;
        $provincia = DB::select("SELECT provincias.nombre as provincia,
                                        municipios.nombre as municipio,
                                        distritos.nombre as distritos,
                                        direcciones.avenida_calle as direccion,
                                        personas.nombre as persona,
                                        pacientes.id
                                 FROM provincias,municipios,distritos ,direcciones,personas,pacientes,casos
                                 WHERE provincias.id = municipios.provincia_id
                                 AND municipios.id = distritos.municipio_id 
                                 AND distritos.id = direcciones.distrito_id
                                 AND direcciones.id = personas.direccion_id
                                 AND personas.id = pacientes.id
                                 AND pacientes.id = casos.paciente_id
                                 AND casos.estado = ".'."confirmados".'."
                                 AND provincias.id = $provincia_id" );
        
        return $provincia;
        
        
        $tipo = TipoExamen::all();
        return $tipo;

        $consulta = 1;



        $examenes = Examen::join('tipo_examen','tipo_examen.id','=','examenes.tipo_id')
        ->join('consultas','consultas.id','=','examenes.consulta_id')
        ->select('tipo_examen.nombre as tipo_examen','examenes.fecha_realizado','examenes.descripcion')
        ->where('examenes.consulta_id','=',$consulta)
        ->get();

        return $examenes;


        $sw = false;

        $examen = Examen::join('consultas','consultas.id','=','examenes.consulta_id')
        ->where('examenes.consulta_id','=',$consulta)
        ->get();
        $count = count($examen);

        if($count){
            $sw = true;
        }
        return ["condicion"=>$sw];


        $prescripcion = Prescripcion::join('consultas','consultas.id','=','prescripciones.consulta_id')
        ->select('consultas.id as consulta_id','prescripciones.indicaciones','prescripciones.medicamento','prescripciones.cantidad_producto','prescripciones.id')
        ->where('prescripciones.consulta_id','=',$consulta)
        ->get();

        return $prescripcion;

        $sw = false;

        $diagnostico = Diagnostico::join('consultas','consultas.id','=','diagnosticos.consulta_id')
        ->where('diagnosticos.consulta_id','=',$consulta)
        ->get();
        $count = count($diagnostico);

        if($count){
            $sw = true;
        }

        return  ["existe"=> $sw];

        $informacionConsulta = DB::select("SELECT consultas.id,
        consultas.motivo_consulta,
        consultas.fecha_registrada,
        consultas.fecha_programada,
        consultas.hora_programada,
        consultas.estado_consulta
        FROM consultas,medicos,pacientes 
        WHERE consultas.medico_id = medicos.id 
        AND consultas.paciente_id =  pacientes.id
        AND consultas.id = $consulta");

        return $informacionConsulta;
        
        // $idMedico = Auth::id();
        // return $idMedico;
        
        $paciente = 9;
        $medico = 2;
        
        $consulta = DB::select("SELECT pacientes.id as paciente_id,
                                    medicos.id as medico_id,
                                    consultas.motivo_consulta,
                                    consultas.fecha_registrada,
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
        consultas.fecha_registrada,
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
        
        $fechaCaso    = '2020-10-17';
        $numeroCasos = 2;
        $internados = "si";
        $casos = "confirmados";

        
       
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
                            $consulta->fecha_registrada   = date("Y-m-d",strtotime($fechaCaso."- 6 days"));
                            $consulta->fecha_programada = date("Y-m-d",strtotime($fechaCaso."- 3 days"));
                            $consulta->hora_programada  = $arrayHoraProgramada[$indexHora]; 
                            $consulta->paciente_id = $paciente->id;
                            $consulta->medico_id = $medico_id;
                            $consulta->save();



                        }else{
                            $consulta = new Consulta();
                            $consulta->estado_consulta = 2;
                            $consulta->motivo->consulta = $motivo[$i];
                            $consulta->fecha_registrada   = date("Y-m-d",strtotime($fechaCaso."- 3 days"));
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
    
                // $table->date('fecha_registrada');
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
