@extends('layouts.app')

@section('content')

    <p><a href="echantillon">Voir la liste des 5 séries les plus récentes</a></p>
    @if(!empty($series))
        <ul>
            <div id="liCat">
                <li><bouton onclick="window.location.href = ('/filtre?cat=nom') ;">Nom</bouton></li>
                <li><bouton onclick="window.location.href =  ('/filtre?cat=genre') ";> Genre </bouton></li>
                <li><bouton onclick="window.location.href =  ('/filtre?cat=premiere') ;"> Date de sortie</bouton></li>
                <li><bouton onclick="window.location.href = ('/filtre?cat=note');"> Note </bouton></li>
            </div>
        </ul>
        <ul>
            <p>Voici la liste des séries disponibles</p>
            <div id="listeSeries">
                @foreach ($series as $serie)
                    <li><br><a href="/sommaire/{{$serie->id}}"><img src="{{$serie->urlImage}}"/></a></li>
                @endforeach
            </div>
        </ul>
    @else
        <h3>Aucune série à afficher</h3>
    @endif
@endsection
