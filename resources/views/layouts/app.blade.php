<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>

    <!-- CSS And JavaScript -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="user_info">
                <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>
            </div>
            <a href="{{route('auth.logout')}}">{{__('logout')}}</a>
        @endif
            <ul>
                <li style="padding: 0px 3px" class="{{\Illuminate\Support\Facades\App::getLocale()=='en'?'active':''}}"><a href="{{route('change-language','en')}}">
                        <img src="https://flagcdn.com/20x15/us.png" alt="English">
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\App::getLocale()=='vi'?'active':''}}" style="padding: 0px 3px"><a href="{{route('change-language','vi')}}" class="">
                        <img src="https://flagcdn.com/20x15/vn.png" alt="Viet Nam">
                    </a>
                </li>
            </ul>
    </nav>
    <style>
        ul{
            display: inline;
            list-style: none;
        }
        ul li{
            float: left;
        }
    </style>
</div>

@yield('content')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
