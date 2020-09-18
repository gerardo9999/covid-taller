<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $primaryKey = 'id';
    
    

    protected $fillable = [
        'nombre',
    ]; 
    public $timestamps=false; 
}
