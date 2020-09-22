<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Diagnostico extends Model
{
    
    protected $table = 'diagnositicos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion',
        'evolucion_enfermedad',
        'consulta_id'
    ];
}
