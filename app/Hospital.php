<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitales';

    protected $primaryKey = 'id';
    
    

    protected $fillable = [
        'nombre',
        'imagen',
        'nivel',
        'telefono',
        'direccion_id'
    ];
}
