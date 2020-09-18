<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    
    protected $table = 'personas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellidos',
        'ci',
        'telefono',
        'nacionalidad',
        'fecha_nacimiento',
        'sexo',
        'direccion_id'
    ];
}
