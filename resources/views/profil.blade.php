@extends('layouts.app')

@section('content')

    @if(!empty($user))
        <h2 class="Profil" >utilisateur {{$user->name}} !</h2>
        <ul id="main-user">
            <li id="profil-picture"> <img src="img/sam.jpg"></p> </li>

            {{--
            @if(!empty($series))
                <p>Vous avez vu : </p>
                @foreach($series as $serie)
                <ul>
                    <li> {{$serie->nom}} </li>
                </ul>
                @endforeach
            @else
                <p>Aucune série n'a été vue pour l'instant!</p>
            @endif
            --}}
        </ul>
    @else
        <h3>Cet utilisateur n'existe pas !</h3>
    @endif

@endsection
