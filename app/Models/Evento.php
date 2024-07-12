<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'evento';

    protected $fillable = [
        'fecha',
        'observacion',
        'turno_id',
        'actividad_id',
        'asignatura_id'
    ];

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
