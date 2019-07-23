<!DOCTYPE HTML>
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META name="viewport" content="initial-scale=1.0, user-scalable=no">
    <META name="csrf-token" content="{{ csrf_token() }}">
    <TITLE>思い出ＭＡＰ</TITLE>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="image/icon16.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="image/icon.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css" media="all">
    @yield('css')
</HEAD>

<BODY>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
   
<div class="container">

    <div class="head_title">
        <a class = 'head_title_a' href="/memorymap/public/home" >
            思い出<span>ＭＡＰ</span>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div id="navbarSupportedContent" class="navbar-collapse collapse" >

        <ul class="navbar-nav mr-auto">
        </ul>

        <ul class="navbar-nav ml-auto"> 
                <li class="nav-item">
                    <a href="/memorymap/public/home" class="nav-link">
                        マップを見る
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="/memorymap/public/torokuGamen" class="nav-link">
                        思い出を増やす
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="/memorymap/public/ichiranGamen" class="nav-link">
                        思い出を振り返る
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                         class="nav-link">
                        {{ __('ログアウト') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="username">ようこそ<span>{{$user->name}}</span>さん</div>
</nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>

</div>
    
    
    
                                
    @yield('content')

</BODY>

</HTML>