@extends('layouts.app')

@section('content')

    @if(!empty($user))
        <h2 class="Profil" >utilisateur {{$user->name}} !</h2>
        <ul id="main-user">
            <li id="profil-picture"> <img src="img/sam.jpg"></p> </li>
            <h2>Liste des séries vues</h2>
            {{-- @foreach($seen as $serie)
                    @if($serie->user=Auth::user()->id)
                    <a href="/sommaire/{{$serie->id}}">{{$serie->nom}}</a>
                    <p></p>
                    @endif
                @endforeach--}}
        </ul>
    @else
        <h3>Cet utilisateur n'existe pas !</h3>
    @endif

@endsection
