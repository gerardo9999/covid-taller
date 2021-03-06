<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescripcion extends Model
{
    protected $table = 'prescripciones';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'cantidad_producto',
        'medicamento',
        'indicaciones',
        'consulta_id'
    ];
}
