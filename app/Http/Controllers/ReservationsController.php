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
    public function index() 
    {
        $events = Event::latest()->get();
        return view("reservations.index", compact('events'));
    }

    public function create(Event $event) 
    {
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

    public function store(Request $request) 
    {    
        $reservation = new Reservation;
        $reservation->user_id = $request->user()->id;
        $reservation->reservation_option_id = $request['reservation_option_id'];
        $reservation->event_id = $request['event_id'];
        $reservation->save();
        return back()->with('success', 'reservation request has been sent');
    }

    public function setTicketCode(Reservation $reservation) 
    {
        $code = bin2hex(random_bytes(5));
        while (Reservation::where('ticket_code', '=', $code)->count() > 0) {
            $code = str_random(10);
        }
        $reservation->ticket_code = $code;
    }

    public function accept_reservation_request(Reservation $reservation) 
    {
        $reservation->acceptance_status_id = 3;
        $this->setTicketCode($reservation);
        $reservation->save();

        $subject = 'Reservation request accepted';
        $opciones_ssl=array(
            "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        );
        $img_path = public_path('/uploads/event_flyers/'. $reservation->event->flyer_image);
        $extention = pathinfo($img_path, PATHINFO_EXTENSION);
        $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
        $img_base_64 = base64_encode($data);
        $path_event_flyer = 'data:image/' . $extention . ';base64,' . $img_base_64;
        
        $pdf = PDF::loadView('pdf.ticket', compact('reservation', 'path_event_flyer'));
        Mail::to($reservation->user->email)->send(new ReservationRequestAccepted($reservation, $subject, $pdf->output()));
        return response()->json(['acceptance_status_update' => 'reservation request has been accepted successfully']);
    }

    public function decline_reservation_request(Reservation $reservation) 
    {
        $reservation->acceptance_status_id = 1;
        $reservation->save();

        $subject = 'Reservation request declined';
        Mail::to($reservation->user->email)->send(new ReservationRequestDeclined($reservation, $subject));
        return response()->json(['acceptance_status_update' => 'reservation request has been declined']);
    }
}
