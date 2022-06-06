@extends("layouts.app")

@section("content")

    <style>
        .reservation-page {
            height: calc(100% - 50px);
            background: black;
            position: relative;
        }
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
        #fname {
            margin-top: 30px;
        }

        .reservation-form-title {
            padding-top: 50px;
            text-align: center;
            color: #FFFFFFCC;
        }
        .alert {
            width: 60%;
            position: absolute;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <div class="reservation-page">
        @if(Session::has('success'))
            <div class="alert alert-success mb-0 mt-2">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="row h-100">
            <div class="col-6 h-100">
                <form action="{{ route('reservation.store') }}" method="post">
                    @csrf
                    <h2 class="reservation-form-title">Reservation</h2>
                    <div class="input-div">
                        <input type="text" class="@error('fname') is-invalid @enderror" name="fname" id="fname" placeholder="First Name" required>
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-div">
                        <input type="text" class="@error('lname') is-invalid @enderror" name="lname" placeholder="Last Name" required>
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-div">
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email Address" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-div">
                        <input type="tel" class="@error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" required>
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary submit-btn" value="Reserve">
                </form>
            </div>
            <div class="col-6 h-100">
                <img class="flyer" src="{{url('images/mawad-flyer.jpg')}}">
            </div>
        </div>
    </div>

@endsection
