<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    use HasFactory;
    protected $table = 'FieldType';
    protected $fillable = [
        'nombre',
        'descripcion',
        'forma',
        'superficie'
    ];

    public function fields(){
        return $this->belongsTo(Field::class, 'field_id');
    }


}
