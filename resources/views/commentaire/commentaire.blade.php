@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
    la série {{$serie->nom}}

    <form action="store/{{$serie->id}}" method="post">
        @csrf
        <div class="form-group">
            <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
            @error('message')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control  @error('note') is-invalid @enderror" name="note" id="note" placeholder="Votre note">{{ old('note') }}</textarea>
            @error('note')
            <div class="invalid-feedback">{{ $note }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-secondary">Envoyer !</button>
    </form>
@endsection
