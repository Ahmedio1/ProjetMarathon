@extends('layouts.app')

@section('content')
    <ul>
        @foreach($comment as $val)
        <li>{{$val->content}} {{$val->note}} {{$val->validated}}</li>
        @endforeach
    </ul>
@endsection