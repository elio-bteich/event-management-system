<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptanceStatus extends Model
{
    use HasFactory;

    // id 0 => rejected
    // id 1 => on hold (by default)
    // id 2 => accepted

}
