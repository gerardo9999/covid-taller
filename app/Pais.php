<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table ='paises';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'code'
    ];
    public $timestamps=false; 
}
