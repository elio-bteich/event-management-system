@extends('layouts.app')

@section('content')

    <style></style>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Events
                            <a href="{{ route('event.create') }}" class="btn btn-primary float-end">Create event</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @foreach($events as $event)
                            <a href="event/{{ $event->id }}">{{ $event->description }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
