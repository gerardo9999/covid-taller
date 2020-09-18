<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';
    protected $primaryKey = 'id';
    
    

    protected $fillable = [
        'nombre',
    ]; 
    public $timestamps=false; 
}
