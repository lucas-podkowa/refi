<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $table = 'turno';

    protected $fillable = [
        'nombre'
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id');
    }
}
