<!DOCTYPE html>

<head>
    <title>mwd mgmt</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='/app/node_modules/intl-tel-input/build/css/intlTelInput.css' rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
</head>

<style>
    .homepage {
        background: none;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100vh;
        width: 100vw;
    }

    .homepage-container {
        padding: 10px 50px;
        height: 100%;
    }

    .homepage-navbar {
        position: relative;
        height: 50px;
        color: black;
        border-bottom: solid 1px black;
    }

    .homepage-navbar-title {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        font-size: 23px;
    }
</style>

<body>
<div class="homepage">
    <div class="homepage-container">
        <div class="homepage-navbar">
            <h3 class="homepage-navbar-title">MWD Management</h3>
        </div>
        @yield("content")
    </div>
</div>
</body>
