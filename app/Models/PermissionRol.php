<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRol extends Model
{
    use HasFactory;
    protected $table = 'permissions_rols';
    protected $fillable = [
        'permission_id',
        'rol_id'
    ];
}
