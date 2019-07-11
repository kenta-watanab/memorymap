<!DOCTYPE HTML>
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <TITLE>思い出ＭＡＰ</TITLE>
    <link rel="icon" href="image/icon16.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="image/icon.png">
    @yield('css')
</HEAD>

<BODY>

     <div class="logout">
     <a href="{{ route('logout') }}"
     onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
     </form>
     </div>
     <div class="head_title">思い出<span>ＭＡＰ</span></div>
     <div class="username">ようこそ<span>{{$user->name}}</span>さん</div>
                            

    <header>
    <!--
    <div class="hidden_box">
        <label for="label1" class="label1">クリックして表示</label>
        <input type="checkbox" id="label1"/>
            <div class="hidden_show">
                <nav>
                    <ul>
                    <li><a href="/memorymap/public/home">ＭＡＰ</a></li>
                    <li><a href="/memorymap/public/torokuGamen">登録</a></li>
                    <li><a href="/memorymap/public/ichiranGamen">一覧</a></li>
                    </ul>
                </nav>
            </div>
     </div>
     -->
    </header>
    
    @yield('content')

</BODY>

</HTML>