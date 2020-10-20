<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicamentoTratamiento extends Model
{
    protected $table = 'medicamento_tratamiento';
    protected $primaryKey ='id';

    protected $fillable = [

        'cantidad',
        'indicaciones',
        'tratamiento_id',
        'medicamento_id'    
    
    ];
    
}
