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


    static function especialidades($searchText){
            $especialidades = Especialidad::select('id','nombre')->orderBy('id','asc')
            ->where('nombre','LIKE','%'.$searchText.'%')
            ->paginate(10);

            return $especialidades;
    }
}
