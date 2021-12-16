@extends('layouts.app')

@section('content')

    @if(!empty($serie))
        <p>Voici les informations sur la série <b>{{$serie->nom}}</b></p>
        <ul>
            <li> <img src="{{asset($serie->urlImage)}}"/> </li>
            <li>Langue : {{$serie->langue}}</li>
            <li>Genre : {{$serie->genre}}</li>
            <li>Date de la première : {{$serie->premiere}}</li>
            <li>Nombre d\'épisodes : {{$nbEpisodes}}</li>
            <li>Nombre de saisons : {{$nbSaisons}}</li>
            <li>Résumé : {{$serie->resume}}</li>
            <li>Note : {{$serie->note}}</li>
            <li>Avis : {{$serie->avis}}</li>
            <li>Laisser : {{$serie->urlAvis}}</li>
            <li> <a href="/listeEpisodes/{{$serie->id}}">Voir la liste des épisodes de la série</a> </li>
            <li> <a href="/create/{{$serie->id}}">Ajouter un commentaire</a> </li>
        </ul>
    @else
        <h3>Aucune information sur la série à afficher</h3>
    @endif

@endsection
