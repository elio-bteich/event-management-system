<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create() {
        $event = Event::latest()->first();
        return view("reservations.create", compact('event'));
    }

    public function store(StoreReservationRequest $request) {
        $canReserve = !Reservation::where('event_id', $request['event_id'])->when($request, function($query, $request) {
            $query->where('email', $request->email)
                ->orWhere('phone_number', $request->phone_number);
        })->exists();
        if ($canReserve) {
            $reservation = new Reservation;
            $reservation->fname = $request['fname'];
            $reservation->lname = $request['lname'];
            $reservation->email = $request['email'];
            $reservation->phone_number = $request['phone_number'];
            $reservation->event_id = $request['event_id'];
            $reservation->save();
            return back()->with('success', 'reservation request has been sent');
        }
        return back()->with('error', 'you have already sent a reservation request to this event');
    }
}
