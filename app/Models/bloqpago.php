<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloqpago extends Model
{
    use HasFactory;
    protected $table = 'bloqpago';
    protected $fillable = [
        'codigo',
        'nombre',
    ];
}
