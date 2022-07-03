<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suministro extends Model
{
    use HasFactory;
    protected $table = 'suministro';
    protected $fillable = [
        'codigo',
        'direccion',
        'distrito',
    ];
}
