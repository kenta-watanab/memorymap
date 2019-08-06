<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body>
    @yield('content')

<footer>
    ©MemoryMap
</footer>

</body>

</html>