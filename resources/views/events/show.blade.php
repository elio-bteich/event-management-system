@extends('layouts.app')

@section('content')

    <style>
        .row {
            height: calc(100% - 80px);
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
            background: rgba(255, 255, 255, 0.9);
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
            background: rgb(176, 176, 176);
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
        td {
            padding: 8px;
        }
        #reservations-tab {
            background-color: white;
        }
    </style>

    <div class="row pt-5">
        <div class="col-4">
            <img class="flyer_image" src="/uploads/event_flyers/{{ $event->flyer_image }}" alt="Flyer Image">
        </div>
        <div class="col-8" style="padding: 0">
            <div class="reservation-bar">
                <div class="row">
                    <div class="col-6" id="reservations-tab">
                        <h5 id="reservations-tab-content">Reservations (<span id="reservations-count">{{$reservation_count}}</span>)</h5>
                    </div>
                    <div class="col-6" id="requests-tab">
                        <h5 id="requests-tab-content">Requests (<span id="requests-count">{{$requests_count}}</span>)</h5>
                    </div>
                </div>
            </div>
            <div id="reservations-data">
                <table class="table">
                    <thead style="background: rgba(0,0,0,0.8); color: white">
                    <tr>
                        <th width="20%">Firstname</th>
                        <th width="20%">Lastname</th>
                        <th width="40%">Email</th>
                        <th width="20%">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4" style="padding: 8px 0">
                            <div class="scrollit">
                                <table style="font-family: 'Nunito', sans-serif; width: 100%">
                                    @foreach($event->reservations as $reservation)
                                        @if($reservation->acceptance_status_id == 3)
                                            <tr>
                                                <td width="20%">{{ $reservation->user->fname }}</td>
                                                <td width="20%">{{ $reservation->user->lname }}</td>
                                                <td width="40%">{{ $reservation->user->email }}</td>
                                                <td width="20%">{{ $reservation->reservation_option->description }}</td>
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
                url: '/events/{{$event->id}}/reservations',
                type: 'GET',
                success: function (data) {
                    $('#reservations-data').html(data)
                    activateReservationsTab()
                }
            })
        })

        $('#requests-tab').click(function(){
            $.ajax({
                url: '/events/{{$event->id}}/requests',
                type: 'GET',
                success: function (data) {
                    $('#reservations-data').html(data)
                    activateRequestsTab()
                }
            })
        })

        function activateReservationsTab() {
            $('#reservations-tab').css('background-color', 'white')
            $('#requests-tab').css('background-color', 'rgb(176, 176, 176)')
        }

        function activateRequestsTab() {
            $('#reservations-tab').css('background-color', 'rgb(176, 176, 176)')
            $('#requests-tab').css('background-color', 'white')
        }
    </script>
@endsection
