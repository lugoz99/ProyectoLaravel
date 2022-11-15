<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    //Relación n a n
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
