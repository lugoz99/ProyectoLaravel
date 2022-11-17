<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentElement extends Model
{
    protected $table = 'rentElements';

    protected $fillable = [
        'nombre',
        'cantidad',
        'tipo',
        'descripcion',
        'marca',
        'reservation_id'
    ];


    public function reservas(){
        return $this->belongsTo(Reservation::class,'reservation_id');
    }
    use HasFactory;
}
