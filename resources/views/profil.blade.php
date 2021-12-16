@extends('layouts.app')

@section('content')

    @if(!empty($user))
        <p>Profil de {{$user->name}} !</p>
        <ul>
            <li> <img src="{{asset($user->avatar)}}"></p> </li>
            <li>Nom : {{$user->name}}</li>
            <li>Mail : {{$user->email}}</li>
            <h2>Liste des séries vues</h2>
                @foreach($seen as $serie)
                    @if($serie->user=Auth::user()->id)
                    <a href="/sommaire/{{$serie->id}}">{{$serie->nom}}</a>
                    <p></p>
                    @endif
                @endforeach
        </ul>
    @else
        <h3>Cet utilisateur n'existe pas !</h3>
    @endif

@endsection
