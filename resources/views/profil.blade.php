@extends('layouts.app')

@section('content')

    @if(!empty($user))
        <p>Profil de {{$user->name}} !</p>
        <ul>
            <li> <img src="{{asset($user->avatar)}}"></p> </li>
            <li>Nom : {{$user->name}}</li>
            <li>Mail : {{$user->email}}</li>
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
