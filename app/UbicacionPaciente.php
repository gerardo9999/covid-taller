<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UbicacionPaciente extends Model
{
    protected $table = 'ubicacion_paciente';
    protected $primaryKey = 'id';

    protected $fillable = [
     
        'fecha_asignacion',
        'fecha_entrada',
        'salida',
        'paciente_id',
        'ubicacion_id'
    ];

    public $timestamps = false;
}
