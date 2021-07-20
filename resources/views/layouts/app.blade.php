<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('title')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="user_info">
                <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>
            </div>
            <a href="{{route('auth.logout')}}">{{__('logout')}}</a>
        @endif
        <ul>
            <li style="padding: 0px 3px" class="{{\Illuminate\Support\Facades\App::getLocale()=='en'?'active':''}}"><a
                    href="{{route('change-language','en')}}">
                    <img src="https://flagcdn.com/20x15/us.png" alt="English">
                </a>
            </li>
            <li class="{{\Illuminate\Support\Facades\App::getLocale()=='vi'?'active':''}}" style="padding: 0px 3px"><a
                    href="{{route('change-language','vi')}}" class="">
                    <img src="https://flagcdn.com/20x15/vn.png" alt="Viet Nam">
                </a>
            </li>
        </ul>
    </nav>
    <style>
        ul {
            display: inline;
            list-style: none;
        }

        ul li {
            float: left;
        }
    </style>
</div>

@yield('content')
</body>
</html>
