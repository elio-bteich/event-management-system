<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price'
    ];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
