<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'flyer_image',
        'location',
        'date',
        'start_time',
        'active'
    ];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function reservation_options() {
        return $this->hasMany(ReservationOption::class);
    }
}
