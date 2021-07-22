<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        @if (Auth::check())
            <div class="user_info">
                <b>{{ Auth::user()->name }}</b>
            </div>
            <a href="{{ route('auth.logout') }}">{{ __('logout') }}</a>
        @endif
        <ul class="list-unstyled">
            <li class="float-left pr-2 {{ app()->getLocale() == 'en' ? 'active' : ''}}"><a
                    href="{{ route('change-language', 'en') }}">
                    <img src="{{ asset('images/us.png') }}" alt="English">
                </a>
            </li>
            <li class="float-left {{ app()->getLocale() == 'vi' ? 'active' : '' }}"><a
                    href="{{ route('change-language', 'vi') }}" class="">
                    <img src="{{ asset('images/vn.png') }}" alt="Viet Nam">
                </a>
            </li>
        </ul>
    </nav>
</div>
    @yield('content')
</body>
</html>
