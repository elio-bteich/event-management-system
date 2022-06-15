@extends("layouts.app")

@section("content")

    <style>
        .homepage-container {
            background: none;
        }
        .row {
            height: 90%;
            margin-bottom: 200px;
            justify-content: center;
        }
        .col-4 {
            height: 100%;
        }
        .events-container {
            position: relative;
            top: 50px;
            height: calc(100% - 50px);
            margin: 0 100px;
            padding: 50px 100px 200px 100px;
        }
        .event-flyer {
            width: 90%;
            height: 100%;
        }
        .event-flyer:hover {
            cursor: pointer;
            transition-delay: 10ms;
            transform: translateY(-10px);
        }
        img {
            height: 100%;
        }
        .title {
            color: rgba(255, 255, 255, 0.71);
            margin: 0 50px 70px 50px;
        }
    </style>

    <div class="events-container">
        <h1 class="title text-center">Events</h1>
            <div class="row">
                @foreach($events as $event)
                <div class="col-4">
                    <a href="reservation/event/{{$event->id}}"><img class="event-flyer" src="/uploads/event_flyers/{{ $event->flyer_image }}"></a>
                </div>
                @endforeach
            </div>
    </div>



@endsection
