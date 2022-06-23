<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        //dd(phpinfo());
        $event = new Event;
        $event->description = $request->input('description');
        if ($request->hasFile('flyer_image')) {
            $file = $request->file('flyer_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/event_flyers/',$filename);
            $event->flyer_image = $filename;
        }
        $event->save();
        $options_count = count($request['options_descriptions']);
        for($i=0;$i<$options_count;$i++) {
            if ($request['options_descriptions'][$i] != null && $request['options_prices'][$i] != null){
                $event->reservation_options()->create(
                    ['description' => $request['options_descriptions'][$i], 'price' => $request['options_prices'][$i]]
                );
            }
        }
        return back()->with('success', 'Event has been successfully created');
    }

    public function show($event) {
        $reservation_count = Reservation::where('event_id', $event)->where('acceptance_status_id', 3)->count();
        $requests_count = Reservation::where('event_id', $event)->where('acceptance_status_id', 2)->count();
        $event = Event::where('id', $event)->first();
        return view('events.show', compact('event', 'reservation_count', 'requests_count'));
    }

    public function get_requests($event) {
        $requests = Reservation::where('event_id', $event)->where('acceptance_status_id', 2)->get();
        return view('events.requests-data', compact('requests'))->render();
    }

    public function get_reservations($event) {
        $reservations = Reservation::where('event_id', $event)->where('acceptance_status_id', 3)->get();
        return view('events.reservations-data', compact('reservations'))->render();
    }
}
