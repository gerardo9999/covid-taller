<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDF extends Model{

    static function provinciaCasos($provincia_id,$caso){

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
                ->where('provincias.id','=',$provincia_id)
                ->where('casos.estado','=',$caso)
            ->get();
        
        return $query;
    }

    static function municipioCasos($caso,$municipio_id){
        $query =  Caso::join('pacientes','pacientes.id','casos.paciente_id')
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
                ->where('municipios.id','=',$municipio_id)
                ->where('casos.estado' ,'=',$caso)
            ->get();
        
        return $query;
    }
    
}
