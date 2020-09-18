<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{

    protected $table = 'casos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'estado',
        'fecha',
        'paciente_id'
    ];
    public $timestamps=false;
}