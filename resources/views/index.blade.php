@extends("layouts.app")

@section("content")
<style>

    body {
        color: rgba(255, 255, 255, 0.85);
    }

    .homepage-content {
        position: relative;
        top: 40%;
        transform: translateY(-50%);
        width: 100%;
        text-align: center;
    }

    .homepage-title {
        width: 100%;
        font-size: 100px;
        font-weight: bolder;
        margin-bottom: 20px;
        display: inline-block;
    }

    .homepage-content .btn {
        text-align: center;
        background: rgba(0,0,0,0);
        border: white solid 2px;
        font-size: 20px;
        width: 12%;
    }

    .homepage-content .btn:hover {
        background: rgba(255,255,255,0.8);
        color: #343333;
    }

    .homepage-text {
        margin-bottom: 30px;
    }
</style>

<div class="homepage-content">
    <h1 class="homepage-title">Welcome to MWD</h1>
    <h4 class="homepage-text">We manage memorable events in Lebanon</h4>
    <a class="btn btn-primary" href="{{ route('reservation.create') }}">Upcoming Event</a>
</div>
@endsection
