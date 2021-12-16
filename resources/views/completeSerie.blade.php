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
            @if (!is_null($auth))
            @if($auth->administrateur == 1)
                @foreach($comments as $comment)
                    @if($comment->validated == 0)
            <li>Avis : {{$comment->content}}</li>
            <form class="btn-group" action="/edit/update/{{$serie->id}}/{{$comment->id}}" method="post">
                @csrf
                <button type="submit" name = "submit" value="valide" >Valide</button>
            </form>

                        @else
                            <li>Avis : {{$comment->content}}</li>
                        @endif
                    @endforeach
            @else
                @foreach($comments as $comment)
                    @if($comment->validated==1)
            <li>Avis : {{$comment->content}}</li>)
                    @endif
                @endforeach
            @endif
            @else
                @foreach($comments as $comment)
                    @if($comment->validated==1)
                        <li>Avis : {{$comment->content}}</li>)
                    @endif
                @endforeach
            @endif
            <li> <a href="/listeEpisodes/{{$serie->id}}">Voir la liste des épisodes de la série</a> </li>
            <li> <a href="/create/{{$serie->id}}">Ajouter un commentaire</a> </li>
        </ul>
    @else
        <h3>Aucune information sur la série à afficher</h3>
    @endif

@endsection
