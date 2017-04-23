<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <style lang="text/css">
        body{
            /*background-image: url({{ URL::to('/') }}/imgs/bg.jpg);*/
            /*background-color: #b3ffd9;*/
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('css')
</head>
<body>
    <div id="app">
        <init></init>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ArtSteet') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li><a href="{{route('profile', ['slug'=>Auth::user()->slug])}}">My Profile</a></li>
                            <li><a href="/forums">Forum</a></li>

                         @else <li><a href="{{route('guest_photos')}}">Discover Arts</a></li>   
                        @endif
                            
                            
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                            </ul>

                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <unread></unread>
                            <li><a href="/messages">Messages @include('messenger.unread-count')</a></li>
                            <li><img src="{{Auth::user()->avatar}}" width="40px" height="40px" style="border-radius: 50%"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="active"><a href="{{route('photos')}}">Discover Arts</a></li>
                                    <li class=""><a href="/messages">Send Messages</a></li>
                                    <li class=""><a href="/pending_requests">See Pending Requests</a></li>
                                    <li class=""><a href="/friends">See Your Friends</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

<br> <br><br>



        @yield('content')
        @if(Auth::check())
            <notification :id="{{ Auth::id() }}"></notification>
        @endif

        <audio id="noty_audio">
            <source src="{{asset('audio/notify.mp3')}}">
            <source src="{{asset('audio/notify.ogg')}}">
            <source src="{{asset('audio/notify.wav')}}">
        </audio>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script>
        @if(Session::has('success'))
            noty({
                    type : 'success',
                    layout : 'bottomLeft',
                    text : '{{Session::get('success')}}'
                });
        @endif
    </script>

    @yield('js')
</body>
</html>
