@extends('layouts.app')

@section('content')
    @if(!empty($date))
        <p>Liste des 5 séries les plus récentes</p>
        <ul>
            <div id="listeSeries">
                @foreach ($date as $serie)
                    <li><b>{{$serie->nom}}</b> <br><a href="sommaire/{{$serie->id}}"><img src="{{$serie->urlImage}}"/></a></li>
                @endforeach
            </div>
        </ul>
    @else
        <h3>Pas de séries pour le moment !</h3>
    @endif
@endsection
