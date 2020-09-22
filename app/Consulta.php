<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'estado_consulta',
        'motivo_consulta',
        
        'fecha_registrada',
        'fecha_programada',
        'historial_id',
        'paciente_id',
        'medico_id'
    ];
}
