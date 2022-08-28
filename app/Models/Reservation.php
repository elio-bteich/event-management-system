<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_option_id',
        'event_id',
        'ticket_code'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function acceptance_status() {
        return $this->belongsTo(AcceptanceStatus::class);
    }

    public function reservation_option() {
        return $this->belongsTo(ReservationOption::class);
    }
}
