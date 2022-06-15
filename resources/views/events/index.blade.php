@extends('layouts.events')

@section('content')

    <style></style>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Events
                            <a href="{{ route('event.create') }}" class="btn btn-primary float-end">Create event</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul>
                        @foreach($events as $event)
                                <li><a href="event/{{ $event->id }}">{{ $event->description }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
