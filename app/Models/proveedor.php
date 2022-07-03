<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedor';
    protected $fillable = [
        'codigo',
        'nombre',
        'cuenta',
    ];
}
