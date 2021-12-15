@extends('layouts.app')

@section('content')

    @if(!empty($episodes))
        <p>Voici la liste des épisodes de la série !</p>
        <ul>
        @foreach($episodes as $episode)
                <li> Episode {{$episode->numero}} : {{$episode->nom}} <br>
                    <form action="dejaVu/{{$episode->id}}/{{\Carbon\Carbon::now()}}/1" method="post">
                        {{--dejaVu/{{$episode->serie_id}}/{{$episode->numero}}/{{\Carbon\Carbon::now()}}/{{\Illuminate\Support\Facades\Auth::id()}}--}}
                        <button name="nomBoutton">Déjà vu !</button>
                    </form>
                </li>
        @endforeach
        </ul>
    @else
        <h3>Aucun épisode sur la série à afficher</h3>
    @endif

@endsection
