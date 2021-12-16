@extends('layouts.app')

@section('content')

    @if(!empty($user))
        <h2 class="Profil" >utilisateur {{$user->name}} !</h2>
        <ul id="main-user">
            <li id="profil-picture"> <img src="img/sam.jpg"></p> </li>
        </ul>
    @else
        <h3>Cet utilisateur n'existe pas !</h3>
    @endif

@endsection
