@extends('layouts.app')

@section('content')
    <style>
        .menu-box {
            background: rgba(199, 199, 199, 0.8);
            height: 20%;
            color: black;
            font-size: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
        }

        .col-6 {
            width: 25%;
        }

        .row {
            position: relative;
            height: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .menu-box:hover {
            background: rgba(255, 255, 255);
            transition-delay: 10ms;
        }

        .menu-box a {
            color: black;
            text-decoration: none;
        }
    </style>

    <div class="row">
        <div class="col-6 menu-box">
            <a href="">Add event</a>
        </div>
        <div class="col-6 menu-box">
            <a href="">Reservation management</a>
        </div>
    </div>

@endsection
