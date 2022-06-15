@extends('layouts.events')

@section('content')

    <style>
        .homepage {
            background: none;
        }
        .homepage-navbar {
            border-bottom-color: black;
        }
        .homepage-navbar-title {
            color: black;
        }
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

        .col-8 {
            height: 95%;
            background: rgba(255, 255, 255, 0.6);
        }
        .scrollit {
            overflow-y: scroll;
            height: 660px;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scrollit::-webkit-scrollbar {
            display: none;
        }
        .reservation-bar {
            height: 50px;
        }
        .reservation-bar .row {
            width: 100%;
            height: 100%;
            margin: 0;
        }
        .reservation-bar .col-6 {
            border: black solid 1px;
            background: #f5f5f5;
            height: 100%;
            text-align: center;
        }
        .reservation-bar .col-6 h5{
            top: 50%;
            transform: translateY(50%);
        }
        .reservation-bar .col-6:hover {
            cursor: pointer;
        }
    </style>

    <div class="row pt-5">
        <div class="col-4">
            <img class="flyer_image" src="/uploads/event_flyers/{{ $event->flyer_image }}" alt="Flyer Image">
        </div>
        <div class="col-8">
            <div class="reservation-bar">
                <div class="row">
                    <div class="col-6" id="reservations-tab" style="background: rgba(0, 0, 0, 0.38);">
                        <h5>Reservations ({{$reservation_count}})</h5>
                    </div>
                    <div class="col-6" id="requests-tab">
                        <h5>Requests ({{$requests_count}})</h5>
                    </div>
                </div>
            </div>
            <div id="reservations-data">
                <table class="table">
                    <thead style="background: rgba(0,0,0,0.8); color: white">
                    <tr>
                        <th width="20%">Firstname</th>
                        <th width="20%">Lastname</th>
                        <th width="30%">Email</th>
                        <th width="30%">PhoneNumber</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="scrollit">
                                <table style="font-family: 'Nunito', sans-serif">
                                    @foreach($event->reservations as $reservation)
                                        @if($reservation->acceptance_status_id == 3)
                                            <tr>
                                                <td width="20%">{{ $reservation->fname }}</td>
                                                <td width="20%">{{ $reservation->lname }}</td>
                                                <td width="30%">{{ $reservation->email }}</td>
                                                <td width="30%">{{ $reservation->phone_number }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#reservations-tab').click(function (){
            $.ajax({
                url: '/event/{{$event->id}}/reservations',
                type: 'GET',
                success: function (data) {
                    $('#reservations-data').html(data)
                }
            })
        })

        $('#requests-tab').click(function(){
            $.ajax({
                url: '/event/{{$event->id}}/requests',
                type: 'GET',
                success: function (data) {
                    $('#reservations-data').html(data)
                }
            })
        })
    </script>
@endsection
