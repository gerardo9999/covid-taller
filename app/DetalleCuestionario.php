<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCuestionario extends Model
{
    protected $table = 'detalle_cuestionario';
    protected $primaryKey = 'id';

    protected $fillable = [
        'respuesta',
        'nota',
        'cuestionario_id',
        'pregunta_id',
    ];
}
