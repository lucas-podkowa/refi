<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equivalencia extends Model
{
    use HasFactory;
    

    protected $fillable = ['asignatura_1', 'asignatura_2'];

    public function asignatura_1()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_1');
    }

    public function asignatura_2()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_2');
    }
}
