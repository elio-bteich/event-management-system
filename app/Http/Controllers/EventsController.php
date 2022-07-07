<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        //dd(phpinfo());
        $event = new Event;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->active = $request->active;
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
                $event->reservation_options()->create([
                    'description' => $request['options_descriptions'][$i],
                    'price' => $request['options_prices'][$i],
                    'min_capacity' => $request['min_capacities'][$i] ?? 1,
                    'max_capacity' => $request['max_capacities'][$i] ?? 1
                ]);
            }
        }
        return back()->with('success', 'Event has been successfully created');
    }

    public function update(Event $event, Request $request)
    {
        // TODO: input validations
        $event->description = $request->description;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->active = $request->active;
        if ($request->hasFile('flyer_image')) {
            $file = $request->file('flyer_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $this->removeImage('event_flyers/'.$event->flyer_image);
            $file->move('uploads/event_flyers/',$filename);
            $event->flyer_image = $filename;
        }

        $old_options = $event->reservation_options()->get();
        for($i=0; $i<count($old_options); $i++) {
            $old_options[$i]->update([
                'description' => $request['old_options_descriptions'][$i],
                'price' => $request['old_options_prices'][$i],
                'min_capacity' => $request['old_min_capacities'][$i] ?? 1,
                'max_capacity' => $request['old_max_capacities'][$i] ?? 1
            ]);
        }

        $new_options_count = 0;

        if (isset($request['new_options_descriptions'])) {
            $new_options_count = count($request['new_options_descriptions']);
        }

        for($i=0;$i<$new_options_count;$i++) {
            if ($request['new_options_descriptions'][$i] != null && $request['new_options_prices'][$i] != null){
                $event->reservation_options()->create([
                    'description' => $request['new_options_descriptions'][$i],
                    'price' => $request['new_options_prices'][$i],
                    'min_capacity' => $request['new_min_capacities'][$i] ?? 1,
                    'max_capacity' => $request['new_max_capacities'][$i] ?? 1
                ]);
            }
        }
        $event->save();
        return redirect('/events');
    }

    public function removeImage($image_name)
    {
        if(File::exists(public_path('uploads/'.$image_name))){
            File::delete(public_path('uploads/'.$image_name));
        }else{
            dd('File does not exists.');
        }
    }

    public function show($event)
    {
        $reservation_count = Reservation::where('event_id', $event)->where('acceptance_status_id', 3)->count();
        $requests_count = Reservation::where('event_id', $event)->where('acceptance_status_id', 2)->count();
        $event = Event::where('id', $event)->first();
        return view('events.show', compact('event', 'reservation_count', 'requests_count'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function destroy(Event $event)
    {
        $event->reservations()->delete();
        $event->reservation_options()->delete();
        $this->removeImage('event_flyers/'.$event->flyer_image);
        $event->delete();
        return back();
    }

    public function get_requests($event)
    {
        $requests = Reservation::where('event_id', $event)->where('acceptance_status_id', 2)->get();
        return view('events.requests-data', compact('requests'))->render();
    }

    public function get_reservations($event)
    {
        $reservations = Reservation::where('event_id', $event)->where('acceptance_status_id', 3)->get();
        return view('events.reservations-data', compact('reservations'))->render();
    }
}
