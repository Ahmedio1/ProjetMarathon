@extends('layouts.app')

@section('content')

    @if(!empty($serie))
        <p>Voici les informations sur la série <b>{{$serie->nom}}</b></p>
        <ul>
            <li> <img src="{{asset($serie->urlImage)}}"> </li>
            <li>Langue : {{$serie->langue}}</li>
            <li>Genre : {{$serie->genre}}</li>
            <li><a href = "/edit/{{$serie->id}}">Voir le descriptif détaillé</a></li>
        </ul>
    @else
        <h3>Aucune information sur la série à afficher</h3>
    @endif

@endsection
