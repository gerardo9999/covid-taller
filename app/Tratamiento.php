<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model{
    protected $table = 'tratamientos';
    protected $primaryKey ='id';

    protected $fillable = [
        'nombre'
    ];
    static function tratamientos($searchText){
        $tratamientos = Tratamiento::
        select('tratamientos.nombre as tratamiento','tratamientos.id as tratamiento_id')
        ->where('tratamientos.nombre','LIKE','%'.$searchText.'%')
        ->paginate(10);

        return $tratamientos;
    }
}
