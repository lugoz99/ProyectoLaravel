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

    public function fields(){
        return $this->belongsToMany(Field::class,Reservation::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,PlayerTeam::class);
    }


}
