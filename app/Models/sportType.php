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
        'descripcion',
        'cancha_id'
    ];

    public function canchas(){
        return $this->belongsTo(Field::class,'cancha_id');

    }
}
