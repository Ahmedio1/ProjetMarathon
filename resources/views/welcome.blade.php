@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
@if(!empty($date))
    <ul>
        @foreach($date as $val)
    <li>{{$val->nom}}</li>
    @endforeach
    </ul>
@else
    <h3>aucune tâche</h3>
@endif
@endsection
