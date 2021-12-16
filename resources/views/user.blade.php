@extends('layouts.app')

@section('content')
    <p>Profil de {{$user->name}} !</p>
    <ul>
        <li> <img src="{{asset($user->avatar)}}"></p> </li>
        <li>Nom : {{$user->name}}</li>
        <li>Mail : {{$user->email}}</li>
    <ul>
        @foreach($comment as $val)
            @if($val->validated ==0)
        <li>{{$val->content}} {{$val->note}} {{$val->validated}}
            <a href ="{{route('edit.com',[$val->serie_id])}} )">lien </a></li>
            @else
                <li>{{$val->content}} {{$val->note}} {{$val->validated}}</li>
            @endif
        @endforeach
    </ul>
@endsection