<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carrera';

    protected $fillable = [
        'nombre',
        'codigo'
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
