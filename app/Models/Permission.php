<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'method'
    ];

    //Relación n a n
    public function roles()
    {
        return $this->belongsToMany(Role::class,PermissionRol::class)->withTimestamps();
    }
}
