<?php

namespace App\Http\Controllers;

use App\Mail\ReservationRequestAccepted;
use App\Mail\ReservationRequestDeclined;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\ReservationOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class ReservationsController extends Controller
{
    public function index() {
        $events = Event::latest()->get();
        return view("reservations.index", compact('events'));
    }

    public function create(Event $event) {
        $event_reservations = $event->reservation_options;
        $capacities_formatted = array();
        foreach ($event_reservations as $event_reservation) {
            $result = '';
            if ($event_reservation->min_capacity >= 1 && $event_reservation->max_capacity > 1) {
                $result = '('. $event_reservation->min_capacity . '-' . $event_reservation->max_capacity.' people)';
            }else if ($event_reservation->min_capacity == 1 && $event_reservation->max_capacity == 1) {
                $result = '(1 person)';
            }
            array_push($capacities_formatted, $result);
        }
        return view('reservations.create', compact('event', 'capacities_formatted'));
    }

    public function store(Request $request) {
        $reservation = new Reservation;
        $reservation->user_id = $request->user()->id;
        $reservation->reservation_option_id = $request['reservation_option_id'];
        $reservation->event_id = $request['event_id'];
        $reservation->save();
        return back()->with('success', 'reservation request has been sent');
    }

    public function accept_reservation_request(Reservation $reservation) {
        $reservation->acceptance_status_id = 3;
        $reservation->save();
        // TODO: send an email to the reservation's email address with the ticket attached.
        $data["email"]=$reservation->user->email;
        $data["client_name"]=$reservation->user->fname . ' ' . $reservation->user->lname;
        $data["subject"]='Ticket ' . $reservation->event->description;
 
        $pdf = PDF::loadView('test', []);
        Mail::to($reservation->user->email)->send(new ReservationRequestAccepted($reservation, $data['subject'], $pdf->output()));
        
        return response()->json(['acceptance_status_update' => 'reservation request has been accepted successfully']);
    }

    public function decline_reservation_request(Reservation $reservation) {
        $reservation->acceptance_status_id = 1;
        $reservation->save();
        Mail::to($reservation->user->email)->send(new ReservationRequestDeclined($reservation));
        return response()->json(['acceptance_status_update' => 'reservation request has been declined']);
    }
}
