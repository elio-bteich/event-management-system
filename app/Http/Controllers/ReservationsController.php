<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create() {
        return view("reservations.create");
    }

    public function store(StoreReservationRequest $request) {
        Reservation::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'phone-number' => $request['phone_number'],
        ]);
        return back()->with('success', 'reservation request has been sent');
    }
}
