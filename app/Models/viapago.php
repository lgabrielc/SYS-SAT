<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viapago extends Model
{
    use HasFactory;
    protected $table = 'viapago';
    protected $fillable = [
        'codigo',
        'nombre',
    ];
}
