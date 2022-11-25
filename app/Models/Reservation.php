<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'fechaReserva',
        'team_id',
        'field_id',
        'estado',
        'hora_inicio',
        'hora_fin'
    ];

    public function elementos(){
        return $this->hasMany(RentElement::class,'reservation_id');
    }
}
