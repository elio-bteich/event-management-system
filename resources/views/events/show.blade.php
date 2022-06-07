@extends('layouts.app')

@section('content')

    <style>
        .row {
            height: calc(100% - 50px);
        }
        .col-4, .col-8{
            height: 100%;
        }

        .flyer_image {
            height: 95%;
            width: 100%;
        }

        .event_title {
            margin-top: 20px;
            color: black;
            text-align: center;
            font-size: 40px;
        }
        table {
            background: rgba(255, 255, 255, 0.25);
        }
        .col-8 {
            height: 95%;
            background: rgba(255, 255, 255, 0.6);
        }
    </style>

    <div class="row pt-5">
        <div class="col-4">
            <img class="flyer_image" src="/uploads/event_flyers/{{ $event->flyer_image }}" alt="Flyer Image">
        </div>
        <div class="col-8">
            <h2 class="event_title mb-5">Reservations</h2>
            <table class="table">
                <thead style="background: rgba(0,0,0,0.8); color: white">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>PhoneNumber</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->fname }}</td>
                            <td>{{ $reservation->lname }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->phone_number }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                        <td>0649524368</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                        <td>0649524368</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
