<!DOCTYPE HTML>
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META name="viewport" content="width=device-width, initial-scale=1">
    <META name="csrf-token" content="{{ csrf_token() }}">
    <TITLE>ＭｅｍｏｒｙＭａｐ</TITLE>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="/image/icon16.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/image/icon.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css" media="all">
    @yield('css')
</HEAD>

<BODY>

    <nav class="navbar navbar-expand-md navbar-light">

        <div class="container">

            <div class="head_title">
                <a class='head_title_a' href="/home">
                    <i class="fas fa-map-marked-alt" style="margin-right:5px;"></i>Ｍｅｍｏｒｙ<span>Ｍａｐ</span>
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="navbar-collapse collapse">

                <ul class="navbar-nav mr-auto">
                </ul>

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a href="https://www.tec-engineer.com/memorymap%e3%81%ae%e4%bd%bf%e3%81%84%e6%96%b9/" target="_blank" class="nav-link">
                            使い方<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/home" class="nav-link">
                            マップを見る<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/torokuGamen" class="nav-link">
                            思い出を増やす<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/ichiranGamen" class="nav-link">
                            思い出を振り返る<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kiyaku" class="nav-link">
                            利用規約<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/policy" class="nav-link">
                            プライバシーポリシー<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link">
                            {{ __('ログアウト') }}<i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    </div>

    @yield('content')

</BODY>

</HTML>