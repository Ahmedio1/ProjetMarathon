@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
    @if(!empty($date))
        <ul id="best">
            @foreach ($date as $serie)
                <li>Nom de la série : {{$serie->nom}} <br><a href="sommaire/{{$serie->id}}"><img src="{{$serie->urlImage}}"/></a></li>
            @endforeach
        </ul>
    @else
        <h3>aucune tâche</h3>
    @endif
@endsection
