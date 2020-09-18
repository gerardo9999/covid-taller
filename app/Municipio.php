<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'id';
    
    

    protected $fillable = [
        'nombre',
        'provincia_id'
    ]; 
    public $timestamps=false; 
}
