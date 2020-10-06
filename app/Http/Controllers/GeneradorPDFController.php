<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Paciente;
use App\PDF as AppPDF;
use App\Provincia;
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




    public function consultaPDF($paciente_id){
        
        $medico_id = Auth::id();
        
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
                                    pacientes.id = $paciente_id AND
                                    medicos.id = $medico_id 
                                    
                              ");

        $datosMedico = DB::select("SELECT personas.nombre ,
                                         personas.apellidos
                                  FROM medicos,
                                       personas,
                                       hospitales 
                                  WHERE medicos.id = personas.id AND 
                                        hospitales.id = medicos.hospital_id AND
                                        medicos.id = $medico_id
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
                                        pacientes.id = $paciente_id
                                        "); 
        
        
        $datosHospital = DB::select("SELECT  nombre,
                                        imagen,
                                        nivel,
                                        telefono,
                                        direccion_id
                                FROM  hospitales,medicos
                                WHERE medicos.hospital_id = hospitales.id AND
                                      medicos.id = $medico_id
                                ");                                   
        
        
        $pdf = PDF::loadView('sistema.modules.pdf.consulta',[
            "consulta"   =>  $consulta,
            "medico"     =>  $datosMedico,
            "paciente"   =>  $datosPaciente,
            "hospital"   =>  $datosHospital
          ]);
        
        return $pdf->download('consulta.pdf');
    }

    public function diagnosticoPDF($diagnostico_id){
        $pdf = PDF::loadView('sistema.modules.pdf.diagnostico');

        return $pdf->download('diagnostico.pdf');
    }

    public function prescripcionPDF($consulta_id){
        $pdf = PDF::loadView('sistema.modules.pdf.prescripcion');

        return $pdf->download('prescripcion.pdf');
    }
}
