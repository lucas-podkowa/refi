<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictado extends Model
{
    use HasFactory;

    protected $table = 'dictado';

    protected $fillable = ['nombre'];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'id');
    }
}
