<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'dimension',
        'estado',
        'descripcion',
        'imagen',
        'ubicacion',
        'tipoCancha_id'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function fieldTypes()
    {
        return $this->hasOne(FieldType::class,'id');
    }
}
