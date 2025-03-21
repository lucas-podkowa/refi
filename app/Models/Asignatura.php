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

    public function dictadosComunes()
    {
        return $this->belongsToMany(Asignatura::class, 'dictado_comun', 'asignatura_1', 'asignatura_2');
    }

    public function dictadosComunesInversos()
    {
        return $this->belongsToMany(Asignatura::class, 'dictado_comun', 'asignatura_2', 'asignatura_1');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'asignatura_user', 'asignatura_id', 'user_id');
    }
}
