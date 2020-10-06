<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
 
    protected $table = 'examenes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fecha_realizado',
        'fecha_resultado',
        'estado',
        'descripcion',
        'resultado',
        'consulta_id',
        'tipo_id'
    ];
}