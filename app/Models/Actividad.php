<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividad';
    protected $fillable = [
        'nombre',
        'codigo'
    ];
    
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
