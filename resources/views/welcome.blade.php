@extends('layouts.app')

@section('content')
    @if(!empty($series))
        <ul>
            <p>Voici la liste des séries disponibles</p>
            <br><br>
            <div id="listeSeries">
                @foreach ($series as $serie)
                    <li>Nom de la série : {{$serie->nom}} <br><a href="/sommaire/{{$serie->id}}"><img src="{{$serie->urlImage}}"/></a></li>
                @endforeach
            </div>
        </ul>
    @else
        <h3>Aucune série à afficher</h3>
    @endif
@endsection
