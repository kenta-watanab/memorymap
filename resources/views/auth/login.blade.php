@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="/css/login.css" media="all">
@endsection

@section('content')

<nav class="navbar navbar-expand-md navbar-light">

    <div class="container">

        <div class="head_title">
            <a href="/home">
                <i class="fas fa-map-marked-alt" style="margin-right:5px;"></i>Ｍｅｍｏｒｙ<span>Ｍａｐ</span>
            </a>
        </div>
    </div>
</nav>

<figure>
    <img src="/image/image.jpg" alt="思い出の写真">
</figure>

<h1>作ろう<br>あなただけの<br>思い出の地図</h1>

<p>Let's make memories map</p>

<section>

    <form method="POST" action="{{ route('login') }}" class='form'>

        @csrf

        <article>

            <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

        </article>

        <article>

            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input" name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label input" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

        </article>

        <article>

            <div class="btn-erea">

                <div class="login-btn">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                </div>

                <div class="new-btn-outer">

                    <div class="nav-link btn-info new-btn" href="{{ route('register') }}">{{ __('新規ID作成') }}</div>

                </div>

            </div>

            @if (Route::has('password.request'))
            <div class="forget_outer">
                <a class="forget" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた場合') }}
                </a>
            </div>
            @endif

        </article>

    </form>
</section>

@endsection