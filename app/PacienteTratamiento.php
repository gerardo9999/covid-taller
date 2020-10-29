<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteTratamiento extends Model
{
    protected $table = 'paciente_tratamiento';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fecha',
        'dias',
        'tratamiento_id',
        'paciente_id'
    ]; 

   
}
