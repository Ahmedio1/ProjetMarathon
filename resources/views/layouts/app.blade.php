<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('../css/style.css') }}" rel="stylesheet">

</head>
<body>
<header>
    <a href="{{ url('/') }}"><img src="/img/aryost.png"/></a>
</header>
<!-- Authentication Links -->
<nav>
    <ul>
        @guest
            <li class="connexion"><a href="{{ route('login') }}">Login</a></li>
            <li class="connexion"><a href="{{ route('register') }}">Register</a></li>
        @else
            <div id="bonjour">
                <p>Bonjour {{ Auth::user()->name }}</p>
            </div>
            <div id="auth">
                @if (Auth::user())
                    <li> <a href="/profil/{{Auth::user()->id}}">Voir le profil</a> </li>
                @endif
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endguest
    </ul>
</nav>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
</body>
</html>
