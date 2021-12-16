@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
    <p><a href="echantillon">Voir la liste des 5 séries les plus récentes</a></p>
    @if(!empty($series))
        <ul>
            <p>Voici la liste des séries disponibles</p>
            <br><br>
            <div id="listeSeries">
                @foreach ($series as $serie)
                    <li> <br><a href="/sommaire/{{$serie->id}}"><img src="{{$serie->urlImage}}"/></a></li>
                @endforeach
            </div>
        </ul>
    @else
        <h3>Aucune série à afficher</h3>
    @endif
@endsection
