@extends('layouts.app')

@section('content')

    @if(!empty($episodes))
        <p>Voici la liste des épisodes de la série !</p>
            <ul>
                <div id="listeEpisodes">
                    @foreach($episodes as $episode)
                            <li> Episode {{$episode->numero}} : {{$episode->nom}} <br>
                                <form action="/listeEpisodes/{{$episode->id}}/{{\Carbon\Carbon::now()}}/1" method="post">
                                    @csrf
                                    {{--dejaVu/{{$episode->serie_id}}/{{$episode->numero}}/{{\Carbon\Carbon::now()}}/{{\Illuminate\Support\Facades\Auth::id()}}--}}
                                    <button name="nomBoutton">Déjà vu !</button>
                                </form>
                            </li>
                    @endforeach
                </div>
            </ul>

    @else
        <h3>Aucun épisode sur la série à afficher</h3>
    @endif

@endsection
