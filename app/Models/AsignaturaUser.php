<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AsignaturaUser extends Pivot
{
    use HasFactory;

    protected $table = 'asignatura_user';

    protected $fillable = [
        'user_id',
        'asignatura_id',
    ];
}
