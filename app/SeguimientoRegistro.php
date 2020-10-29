<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguimientoRegistro extends Model
{
    protected $table = 'seguimiento_registro';
    protected $primaryKey = 'id';

    protected $fillable = [
     
        'estado',
        'evolucion_enfermedad',
        'seguimiento_id',
        'registro_id'
    ];
}
