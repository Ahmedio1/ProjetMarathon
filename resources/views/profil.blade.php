@extends('layouts.app')

@section('content')

    @if(!empty($profil))
        <p>Profil de {{$profil->name}} !</p>
        <ul>
            <li> <img src="{{asset($profil->avatar)}}"></p> </li>
            <li>Nom : {{$profil->name}}</li>
            <li>Mail : {{$profil->email}}</li>
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
