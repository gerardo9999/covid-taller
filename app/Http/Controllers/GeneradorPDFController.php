<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Consulta;
use App\Diagnostico;
use App\Especialidad;
use App\Examen;
use App\Hospital;
use App\Medico;
use App\Municipio;
use App\Paciente;
use App\PDF as AppPDF;
use App\Persona;
use App\Prescripcion;
use App\Provincia;
use App\TipoExamen;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneradorPDFController extends Controller
{
    public function imprimir(){        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $products = Paciente::all(); 

        $pdf = PDF::loadView('pdf.prueba', [
            'productos'=> $products
        ]);

        return $pdf->download('listado.pdf');
    }

    //PDF de Provincias

    public function provinciaConfirmadosPDF($provincia_id){
        
        $provincia = Provincia::findOrFail($provincia_id);
        $nombreProvincia = $provincia->nombre;

        $confirmados = AppPDF::provinciaCasos($provincia_id,'confirmados');

        $totalConfirmados = count($confirmados);

        $pdf = PDF::loadView('sistema.modules.pdf.provincias.confirmados', [
            'confirmados'   => $confirmados,
            'totalConfirmados' => $totalConfirmados,            
            'provincia'        => $nombreProvincia

        ]);

        return $pdf->download('casos-confirmados.pdf');
    }
    public function provinciaRecuperadosPDF($provincia_id){
        $provincia = Provincia::findOrFail($provincia_id);
        $nombreProvincia = $provincia->nombre;

        $recuperados = AppPDF::provinciaCasos($provincia_id,'recuperados');
        $totalRecuperados = count($recuperados);

        $pdf = PDF::loadView('sistema.modules.pdf.provincias.recuperados',[
            'recuperados'   => $recuperados,
            'totalRecuperados' => $totalRecuperados,   
            'provincia'        => $nombreProvincia

        ]);

        return $pdf->download('casos-recuperados.pdf');
    }
    public function provinciaSospechososPDF($provincia_id){
        $provincia = Provincia::findOrFail($provincia_id);
        $nombreProvincia = $provincia->nombre;
        $sospechosos = AppPDF::provinciaCasos($provincia_id,'sospechosos');
        $totalSospechosos = count($sospechosos);

        $pdf = PDF::loadView('sistema.modules.pdf.provincias.sospechosos',[
            'sospechosos'   => $sospechosos,
            'totalSospechosos' => $totalSospechosos,  
            'provincia'        => $nombreProvincia

        ]);

        return $pdf->download('casos-sospechosos.pdf');

    }
    public function provinciaDesesosPDF($provincia_id){
        $provincia = Provincia::findOrFail($provincia_id);
        $nombreProvincia = $provincia->nombre;

        $desesos     = AppPDF::provinciaCasos($provincia_id,'desesos');
        $totalDesesos     = count($desesos);


        $pdf = PDF::loadView('sistema.modules.pdf.provincias.desesos',[
            'desesos'       => $desesos,
            'totalDesesos'     => $totalDesesos,
            'provincia'        => $nombreProvincia
        ]);

        return $pdf->download('casos-desesos.pdf');

    }
    public function provinciaDescartadosPDF($provincia_id){
        
        $provincia = Provincia::findOrFail($provincia_id);
        $nombreProvincia = $provincia->nombre;
        $descartados = AppPDF::provinciaCasos($provincia_id,'descartados');
        $totalDescartados = count($descartados);

        $pdf = PDF::loadView('sistema.modules.pdf.provincias.descartados',[
            'descartados'   => $descartados,
            'totalDescartados' => $totalDescartados,
            'provincia'        => $nombreProvincia
        ]);

        return $pdf->download('casos-descartados.pdf');
    }

    






    public function municipioPDF($municipio_id){

    }




    public function consultaPDF($consulta_id){
        
        $medico_id = Auth::id();
        $consulta = Consulta::findOrFail($consulta_id);
        $medico = Medico::findOrFail($medico_id);
        $hospital = Hospital::findOrFail($medico->hospital_id);


        $paciente = Paciente::findOrFail($consulta->paciente_id);

        $personaMedico = Persona::findOrFail($medico->id);
        $personaPaciente = Persona::findOrFail($paciente->id);
        

        



        // $consulta = DB::select("SELECT pacientes.id as paciente_id,
        //                             medicos.id as medico_id,
        //                             consultas.motivo_consulta,
        //                             consultas.fecha_registrada,
        //                             consultas.fecha_programada,
        //                             consultas.hora_programada
        //                       FROM  pacientes,
        //                             medicos,
        //                             consultas
        //                       WHERE consultas.paciente_id = pacientes.id AND 
        //                             consultas.medico_id =  medicos.id AND 
        //                             pacientes.id = $paciente->id AND
        //                             medicos.id = $medico_id 
                                    
        //                       ");

        $data = [
            "consulta"          =>  $consulta,
            "medico"            =>  $medico,
            "paciente"          =>  $paciente,
            "personaMedico"     =>  $personaMedico,
            "personaPaciente"   =>  $personaPaciente,
            "hospital"          =>  $hospital
        ];


        
        // $datosMedico = DB::select("SELECT personas.nombre ,
        //                                  personas.apellidos
        //                           FROM medicos,
        //                                personas,
        //                                hospitales 
        //                           WHERE medicos.id = personas.id AND 
        //                                 hospitales.id = medicos.hospital_id AND
        //                                 medicos.id = $medico_id
        //                           ");      
                                  
        // $datosPaciente = DB::select("SELECT  nombre,
        //                                         apellidos,
        //                                         ci,
        //                                         telefono,
        //                                         nacionalidad,
        //                                         fecha_nacimiento,
        //                                         sexo,
        //                                         direccion_id
        //                                 FROM pacientes, personas 
        //                                 WHERE pacientes.id = personas.id AND 
        //                                 pacientes.id = $paciente_id
        //                                 "); 
        
        
        // $datosHospital = DB::select("SELECT  nombre,
        //                                 imagen,
        //                                 nivel,
        //                                 telefono,
        //                                 direccion_id
        //                         FROM  hospitales,medicos
        //                         WHERE medicos.hospital_id = hospitales.id AND
        //                               medicos.id = $medico_id
        //                         ");                                   
        
        
        $pdf = PDF::loadView('sistema.modules.pdf.consulta.consulta',$data);
        
        return $pdf->download('consulta.pdf');
    }

    public function diagnosticoPDF($diagnostico_id){
        
        $diagnostico = Diagnostico::findOrFail($diagnostico_id);
        $consulta = Consulta::findOrFail($diagnostico->consulta_id);
        $paciente = Paciente::findOrFail($consulta->paciente_id);
        $personaPaciente  = Persona::findOrFail($paciente->id);
        $medico = Medico::findOrFail($consulta->medico_id);
        $personaMedico  = Persona::findOrFail($medico->id);
        $hospital = Hospital::findOrFail($medico->hospital_id);
        $especialidad = Especialidad::findOrFail($medico->especialidad_id);


        $data = [
                "diagnostico" => $diagnostico,
                "consulta"  => $consulta,
                "paciente"  => $paciente,
                "personaPaciente"  => $personaPaciente,
                "medico"  => $medico,
                "personaMedico"  => $personaMedico,
                "hospital" => $hospital,
                "especialidad" => $especialidad
            ];

        $pdf = PDF::loadView('sistema.modules.pdf.diagnostico.diagnostico',$data);
        return $pdf->download('diagnostico.pdf');
    }

    public function prescripcionPDF($consulta_id){

        $consulta         = Consulta::findOrFail($consulta_id);
        $paciente         = Paciente::findOrFail($consulta->paciente_id);
        $personaPaciente  = Persona::findOrFail($paciente->id);
        $medico           = Medico::findOrFail($consulta->medico_id);
        $personaMedico    = Persona::findOrFail($medico->id);
        $hospital         = Hospital::findOrFail($medico->hospital_id);
        $especialidad     = Especialidad::findOrFail($medico->especialidad_id);

        $prescripciones = Prescripcion::join('consultas','consultas.id','=','prescripciones.consulta_id')
        ->where('prescripciones.consulta_id','=',$consulta_id)->get();
        
        $data = [
            "prescripciones"    => $prescripciones,
            "consulta"          => $consulta,
            "medico"            => $medico,
            "personaMedico"     => $personaMedico,
            "hospital"          => $hospital,
            "especialidad"      => $especialidad,
            "paciente"          => $paciente,
            "personaPaciente"   => $personaPaciente
        ];

        $pdf = PDF::loadView('sistema.modules.pdf.prescripcion.prescripcion',$data);

        return $pdf->download('prescripcion.pdf');
    }

    public function miPrescripcionPDF($prescripcion_id){
        $prescripcion     = Prescripcion::findOrFail($prescripcion_id);
        $consulta         = Consulta::findOrFail($prescripcion->consulta_id);
        $paciente         = Paciente::findOrFail($consulta->paciente_id);
        $personaPaciente  = Persona::findOrFail($paciente->id);
        $medico           = Medico::findOrFail($consulta->medico_id);
        $personaMedico    = Persona::findOrFail($medico->id);
        $hospital         = Hospital::findOrFail($medico->hospital_id);
        $especialidad     = Especialidad::findOrFail($medico->especialidad_id);
        
         $data = [
            "prescripciones"    => $prescripcion,
            "consulta"          => $consulta,
            "medico"            => $medico,
            "personaMedico"     => $personaMedico,
            "hospital"          => $hospital,
            "especialidad"      => $especialidad,
            "paciente"          => $paciente,
            "personaPaciente"   => $personaPaciente
        ];

        $pdf = PDF::loadView('sistema.modules.pdf.prescripcion.miPrescripcion',$data);

        return $pdf->download('prescripcion.pdf');

    }

    public function miExamenPDF($examen_id){
        $examen           = Examen::findOrFail($examen_id);
        $tipo             = TipoExamen::findOrFail($examen->tipo_id); 
        $consulta         = Consulta::findOrFail($examen->consulta_id);
        $paciente         = Paciente::findOrFail($consulta->paciente_id);
        $personaPaciente  = Persona::findOrFail($paciente->id);
        $medico           = Medico::findOrFail($consulta->medico_id);
        $personaMedico    = Persona::findOrFail($medico->id);
        $hospital         = Hospital::findOrFail($medico->hospital_id);
        $especialidad     = Especialidad::findOrFail($medico->especialidad_id);
        
        $data = [
            "examenes"          => $examen,
            "tipo"              => $tipo,
            "consulta"          => $consulta,
            "medico"            => $medico,
            "personaMedico"     => $personaMedico,
            "hospital"          => $hospital,
            "especialidad"      => $especialidad,
            "paciente"          => $paciente,
            "personaPaciente"   => $personaPaciente
        ];

        $pdf = PDF::loadView('sistema.modules.pdf.examen.miExamen',$data);

        return $pdf->download('examen.pdf');

    }

    
    public function resultadoExamenPDF($examen_id){
        
    }

















    //PDF de municipios
    public function municipioConfirmadosPDF($municipio_id){
        $municipio = Municipio::findOrFail($municipio_id);
        $nombreMunicipio = $municipio->nombre;

        $confirmados = AppPDF::provinciaCasos($municipio_id,'confirmados');

        $totalConfirmados = count($confirmados);

        $pdf = PDF::loadView('sistema.modules.pdf.municipios.confirmados', [
            'confirmados'   => $confirmados,
            'totalConfirmados' => $totalConfirmados,            
            'municipio'        => $nombreMunicipio

        ]);

        return $pdf->download('casos-confirmados.pdf');
    }
    public function municipioRecuperadosPDF($municipio_id){
        $municipio = Municipio::findOrFail($municipio_id);
        $nombreMunicipio = $municipio->nombre;

        $recuperados = AppPDF::municipioCasos($municipio_id,'recuperados');
        $totalRecuperados = count($recuperados);

        $pdf = PDF::loadView('sistema.modules.pdf.municipios.recuperados',[
            'recuperados'   => $recuperados,
            'totalRecuperados' => $totalRecuperados,   
            'municipio'        => $nombreMunicipio

        ]);

        return $pdf->download('casos-recuperados.pdf');
    }
    public function municipioSospechososPDF($municipio_id){
        $municipio = Municipio::findOrFail($municipio_id);
        $nombreMunicipio = $municipio->nombre;
        $sospechosos = AppPDF::municipioCasos($municipio_id,'sospechosos');
        $totalSospechosos = count($sospechosos);

        $pdf = PDF::loadView('sistema.modules.pdf.municipios.sospechosos',[
            'sospechosos'   => $sospechosos,
            'totalSospechosos' => $totalSospechosos,  
            'municipio'        => $nombreMunicipio
        ]);

        return $pdf->download('casos-sospechosos.pdf');

    }
    public function municipioDesesosPDF($municipio_id){
        $municipio = Municipio::findOrFail($municipio_id);
        $nombreMunicipio = $municipio->nombre;

        $desesos     = AppPDF::municipioCasos($municipio_id,'desesos');
        $totalDesesos     = count($desesos);


        $pdf = PDF::loadView('sistema.modules.pdf.municipios.desesos',[
            'desesos'       => $desesos,
            'totalDesesos'     => $totalDesesos,
            'municipio'        => $nombreMunicipio
        ]);

        return $pdf->download('casos-desesos.pdf');

    }
    public function municipioDescartadosPDF($municipio_id){
        
        $municipio = Municipio::findOrFail($municipio_id);
        $nombreMunicipio = $municipio->nombre;
        $descartados = AppPDF::municipioCasos($municipio_id,'descartados');
        $totalDescartados = count($descartados);

        $pdf = PDF::loadView('sistema.modules.pdf.municipios.descartados',[
            'descartados'   => $descartados,
            'totalDescartados' => $totalDescartados,
            'municipio'        => $nombreMunicipio
        ]);

        return $pdf->download('casos-descartados.pdf');
    }



    
}
