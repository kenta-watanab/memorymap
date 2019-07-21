<!DOCTYPE HTML>
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META name="viewport" content="initial-scale=1.0, user-scalable=no">
    <TITLE>思い出ＭＡＰ</TITLE>
    @yield('css')
    <style type="text/css">
      html { height: 100% }
      body { height: 100% }
    </style>
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
                                
    @yield('content')

</BODY>

</HTML>