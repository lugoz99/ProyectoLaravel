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

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function field()
    {
        return $this->belongsToMany(Field::class);
    }
}