<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = 'asignatura';
    protected $fillable = [
        'nombre',
        'codigo', 
        'dictado_id',
        'carrera_id',
        'ciclo',
        'responsable'
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
    
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function dictado()
    {
        return $this->belongsTo(Dictado::class, 'dictado_id', 'id');
    }

    public function equivalencias()
    {
        return $this->belongsToMany(Asignatura::class, 'equivalencia', 'asignatura_1', 'asignatura_2');
    }

    public function equivalenciasInversas()
    {
        return $this->belongsToMany(Asignatura::class, 'equivalencia', 'asignatura_2', 'asignatura_1');
    }
}
