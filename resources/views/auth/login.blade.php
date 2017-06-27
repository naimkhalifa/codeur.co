@extends('layouts.front.master')

@section('content')
<section class="hero is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-4 is-offset-4">
                    <h1 class="title">
                        Connexion
                    </h1>
                    <div class="box">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            
                            <div class="field">
                                <label class="label">E-mail</label>
                                <p class="control">
                                    <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" value="{{old('email')}}" placeholder="john@example.com" required="required">
                                </p>
                                @if ($errors->has('email'))
                                    <p class="help is-danger"><strong>{{ $errors->first('email') }}</strong></p>
                                @endif
                            </div>

                            
                            <div class="field">
                                <label class="label">Mot de passe</label>
                                <p class="control">
                                    <input class="input" type="password" name="password" placeholder="●●●●●●●" required="required">
                                </p>
                                @if ($errors->has('password'))
                                    <p class="help is-danger"><strong>{{ $errors->first('password') }}</strong></p>
                                @endif
                            </div>
                                

                            <div class="field">
                                <p class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                    </label>
                                </p>
                            </div>
                            
                            <p class="control">
                                <button type="submit" class="button is-primary">Connexion</button>
                            </p>
                        </form>
                    </div>
                    <p class="has-text-centered">
                        <a href="/register">S'enregistrer</a>
                    </p>                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
