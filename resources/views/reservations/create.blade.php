@extends("layouts.app")

@section("content")

    <style>
        form {
            left: 100%;
            top: 50%;
            height: 75%;
            width: 60%;
            transform: translate(-100%, -50%);
            position: relative;
            background: #1f1f1f;
        }
        .input-div {
            padding: 20px;
        }
        input {
            border: none;
            border-bottom: solid rgb(143, 143, 143) 1px;
            font-size: 18px;
            background: none;
            color: rgba(255, 255, 255, 0.555);
            margin-bottom: 28px;
            height: 35px;
            width: 100%;
        }
        input:focus{
            outline: none;
        }

        .row {
            margin: 0;
            --bs-gutter-x: 0;
            --bs-gutter-y: 0;
        }
        .submit-btn {
            position: relative;
            left: 50%;
            background: black;
            border: none;
            transform: translateX(-50%);
            width: 30%;
            height: 40px;
            margin: 20px 0 40px 0;
            color: rgba(255, 255, 255, 0.68);
            font-size: 18px;
        }
        .submit-btn:hover {
            background: rgba(164, 164, 164, 0.8);
            color: black;
        }
        .flyer {
            width: 60%;
            height: 75%;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
        .fname {
            margin-top: 30px;
        }

        .reservation-form-title {
            padding-top: 50px;
            text-align: center;
            color: #FFFFFFCC;
            margin-bottom: 50px;
        }
        .customed-alert {
            width: 60%;
            position: absolute;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        select:hover {
            cursor: pointer;
        }

        #reservation_option_option, #reservation_option_select {
            text-transform: capitalize;
        }
    </style>

        @if(Session::has('success'))
            <div class="customed-alert alert alert-success mb-0 mt-2">
                {{Session::pull('success')}}
            </div>
        @endif
            @if(Session::has('error'))
                <div class="customed-alert alert alert-danger mb-0 mt-2">
                    {{Session::pull('error')}}
                </div>
            @endif
        <div style="height: calc(100% - 77px)" class="row">
            <div class="col-6 h-100 reservation-box">
                <form action="{{ route('reservation.store') }}" method="post">
                    @csrf
                    <div id="create-input-box">
                        <h2 class="reservation-form-title">Reservation</h2>
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="input-div">
                            <select id="reservation_option_select" name="reservation_option_id" class="form-control col-md-4 col-form-label ml-3" required>
                                <option value="" disabled selected>Select your option</option>
                                @foreach($event->reservation_options as $reservation_option)
                                    <option id="reservation_option_option" value="{{$reservation_option->id}}">{{$reservation_option->description}} - {{$reservation_option->price}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary submit-btn" value="Reserve">
                </form>
            </div>
            <div class="col-6 h-100">
                <img class="flyer" src="/uploads/event_flyers/{{ $event->flyer_image }}">
            </div>
        </div>


@endsection
