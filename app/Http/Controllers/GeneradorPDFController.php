<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneradorPDFController extends Controller
{
    public function imprimir()
    {        
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


    public function consultaPDF($paciente_id){
        
        $medico_id = Auth::id();
        
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
        
        
        $pdf = PDF::loadView('admin.modules.pdf.consulta',[
            "consulta"   =>  $consulta,
            "medico"     =>  $datosMedico,
            "paciente"   =>  $datosPaciente,
            "hospital"   =>  $datosHospital
          ]);
        
        return $pdf->download('consulta.pdf');
    }
}
