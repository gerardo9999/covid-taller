<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    protected $table = 'historiales_medicos';
    protected $primaryKey = 'id';
    
    

    protected $fillable = [
        'altura',
        'peso',
        'alergia',
        'enfermedad',
        'fecha_registro',  
        'paciente_id'
    ]; 

}
