<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password'
    ];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
