<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'avenida_calle',
        'numero_domicilio',
        'barrio_zona',
        'distrito_id'
    ];

    public $timestamps=false; 

}