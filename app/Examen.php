<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
 
    protected $table = 'especialidades';
    protected $primaryKey = 'id';

    protected $fillable = [
        'resultado',
        'tipo',
        'consulta_id'
    ];
}