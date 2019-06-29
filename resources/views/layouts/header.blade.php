<!DOCTYPE HTML>
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <TITLE>思い出ＭＡＰ</TITLE>
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
        <nav>
            <ul>
                <li><a href="/MemoryMap/public/home">ＭＡＰ</a></li>
                <li><a href="/MemoryMap/public/torokuGamen">登録</a></li>
                <li><a href="/MemoryMap/public/ichiranGamen">一覧</a></li>
            </ul>
        </nav>
    </header>
    
    @yield('content')

</BODY>

</HTML>