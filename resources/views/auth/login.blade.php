
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="box-connection">
                        <img src="/img/logo.png"/>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row-mb-3">


                                <div class="col-md-6">
                                    <label for="email" class="label_o" class="col-md-4 col-form-label text-md-right"></label>

                                        <input id="email" type="email" placeholder="Nom d'utilisateur" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row-mb-3">


                                <div class="col-md-6">
                                    <div>
                                    <label for="password" class="label_o" class="col-md-4 col-form-label text-md-right"></label>
                                    </div>

                                    <input id="password" placeholder="Mot De Passe" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Se souvenir de moi') }}
                                        </label>
                                        <div> <a href=""> Créer un compte </a> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="button">
                                        <img src="/img/login.png"/>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

