<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SportTypes;

class Field extends Model
{
    use HasFactory;
    protected $table = 'fields';
    protected $fillable = [
        'nombre',
        'dimension',
        'estado',
        'descripcion',
        'imagen',
        'ubicacion',
        'tipoCancha_id',
        'ubicacion_id'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class,Reservation::class);
    }

    public function fieldTypes()
    {
        return $this->hasOne(FieldType::class,'id');
    }

    public function location(){
        return $this->hasOne(Location::class,'id','ubicacion_id');
    }

    public function typeSport(){
        return $this->hasMany(sportType::class,'cancha_id');
    }


}
