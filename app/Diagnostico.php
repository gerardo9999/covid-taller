<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Diagnostico extends Model
{
    
    protected $table = 'diagnosticos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion',
        'evolucion_enfermedad',
        'consulta_id'
    ];
}
