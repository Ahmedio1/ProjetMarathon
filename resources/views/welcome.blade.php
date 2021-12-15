@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
    <p><a href="echantillon">Voir la liste des 5 séries les plus récentes</a></p>
    @if(!empty($series))
        <ul>
            <p>Voici la liste des séries disponibles</p>
            @foreach ($series as $serie)
                <li>Nom de la série : {{$serie->nom}} <br><a href="sommaire/{{$serie->id}}"><img src="{{$serie->urlImage}}"/></a></li>
            @endforeach
        </ul>
    @else
        <h3>Aucune série à afficher</h3>
    @endif
@endsection
