<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptanceStatus extends Model
{
    use HasFactory;

    // id 1 => rejected
    // id 2 => on hold (by default)
    // id 3 => accepted

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

}
