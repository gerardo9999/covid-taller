<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    
    protected $table = 'ubicacion';
    protected $primaryKey = 'id';

    protected $fillable = [
        'numero_sala',
        'numero_cama',
        'paciente_id',
        'hospital_id'
    ];
}
