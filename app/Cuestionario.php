<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionario';
    protected $primaryKey = 'id';

    protected $fillable =[
        'nota',
        'probabilidad',
        'persona_id'
    ];
}
