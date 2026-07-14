<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencias extends Model
{
    protected $table = 'asistencias';

    protected $fillable = [
        'id_empleado',
        'fecha_hora',
        'hora_salida',
        'hora_entrada',
    ];

    protected $casts = [
        'fecha_hora' => 'date',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'id_empleado');
    }
}