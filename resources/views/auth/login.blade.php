@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
@endsection

@section('content')

<h1>Ｍｅｍｏｒｙ<br><span>Ｍａｐ</span></h1>                    
<form method="POST" action="{{ route('login') }}" class='form'> 

    @csrf

    <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>                                
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input" name="email" value="{{ old('email') }}" required autofocus>

    @if ($errors->has('email'))                                    
        <span class="invalid-feedback" role="alert">             
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>                               
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input" name="password" required>
                                
    @if ($errors->has('password'))                                    
        <span class="invalid-feedback" role="alert">          
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
                                
    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label input" for="remember">
        {{ __('Remember Me') }}
    </label>

    <br>
                            
    <button type="submit" class="btn btn-primary">                                    
        {{ __('Login') }}
    </button>
                            
    <a class="nav-link btn-info newBtn" href="{{ route('register') }}">{{ __('新規ID作成') }}</a>
                                
    @if (Route::has('password.request'))                                
    <a class="btn btn-link input" href="{{ route('password.request') }}">                                        
        {{ __('パスワードを忘れた場合') }}
    </a>
    @endif
                    
</form>
            
@endsection
