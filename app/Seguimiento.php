<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimientos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'etapa',
        'paciente_tratamiento_id'
    ];
}