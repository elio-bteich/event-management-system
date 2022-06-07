<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        return back()->with('success', 'Event has been successfully created');
    }

    public function show(Event $event) {
        return view('events.show', compact('event'));
    }
}
