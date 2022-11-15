<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sportType extends Model
{
    use HasFactory;
    protected $table = 'sportTypes';
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}
