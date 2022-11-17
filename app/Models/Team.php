<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function field()
    {
        return $this->belongsToMany(Field::class,'field_id','reservation');
    }
}
