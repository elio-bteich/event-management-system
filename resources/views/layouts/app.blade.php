<!DOCTYPE html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>mwd mgmt</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    .main-container {
        background: black;
        height: 100vh;
        width: 100vw;
    }
    .customed-container {
        padding: 10px 100px;
        height: 100%;
    }
    .customed-navbar {
        position: relative;
        height: 50px;
        color: rgba(255, 255, 255, 0.8);
        border-bottom: solid 1px rgba(255, 255, 255, 0.2);
    }
    .customed-navbar-title {
        padding: 14px 16px;
        font-size: 23px;
    }
    .customed-navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    .customed-navbar li {
        float: right;
        font-size: 18px;
    }
    .customed-navbar li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        text-transform: capitalize
    }
    h1, h2, h3, h4, h5, h6 {
        margin: 0;
        padding: 0;
    }

    #navbar {
        border-bottom: rgba(255, 255, 255, 0.9) solid 1px;
    }

    #navbar a, #navbar li {
        color: rgba(255, 255, 255, 0.9);
        font-size: 18px;
    }

    #navbar li {
        padding: 15px 0 15px 30px;
    }

    #navbar-title{
        padding-left: 0;
    }

    #navbar .dropdown-item {
        color: black;
    }
    #navbar .dropdown-toggle:hover {
        text-decoration: none;
    }
</style>

<body>
<div class="main-container">
    <div class="customed-container">
        <nav id="navbar" class="navbar-expand-lg navbar-light">
            <a style="font-size: 24px" class="navbar-brand" id="navbar-title" href="/">MWD Management</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div id="right-navbar" class="navbar-nav navbar-right">
                    @auth
                        <li class="dropdown" style="padding: 0">
                            <a style="font-size: 20px" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->fname }} {{Auth::user()->lname}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endguest
                </div>
            </div>
        </nav>
        @yield("content")
    </div>
</div>
</body>
