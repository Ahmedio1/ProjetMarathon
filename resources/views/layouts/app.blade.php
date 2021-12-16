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
                    <li class="profil"> <a href="/user">profil</a> </li>
                @endif
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endguest
    </ul>
    <li><bouton onclick="window.location.href = ('/filtre?cat=nom') ;">nom</bouton></li>
    <li><bouton onclick="window.location.href =  ('/filtre?cat=genre') ";> genre </bouton></li>
    <li><bouton onclick="window.location.href =  ('/filtre?cat=premiere') ;"> date de sortie</bouton></li>
    <li><bouton onclick="window.location.href = ('/filtre?cat=note');"> note </bouton></li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Genre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <bouton onclick="window.location.href=('/trierGenre?cat=Comedy')">Action</bouton>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
</nav>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
</body>
</html>
