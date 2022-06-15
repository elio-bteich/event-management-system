<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Mail\AuthenticationEmail;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationsController extends Controller
{
    public function index() {
        $events = Event::latest()->get();
        return view("reservations.index", compact('events'));
    }

    public function create(Event $event) {
        return view('reservations.create', compact('event'));
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

    public function update_acceptance_status(Event $event, Reservation $reservation, Request $request) {
        if ($request['action'] == 'Decline') {
            $reservation->acceptance_status_id = 1;
            $reservation->save();
            return back()->with('acceptance_status_update', 'reservation request has been declined');
        }
        $reservation->acceptance_status_id = 3;
        $reservation->save();
        return back()->with('acceptance_status_update', 'reservation request has been accepted successfully');
    }

    public function send_email_verification($email_address) {
        $verification_code = rand(100000, 999999);
        Mail::to($email_address)->send(new AuthenticationEmail($verification_code));
        $verification_code = hash('sha256', $verification_code);
        return response()->json($verification_code);
    }
}
