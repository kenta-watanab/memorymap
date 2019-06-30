@extends('layouts.header')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/insertInfo.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

    <div class="container">
        <div class="inline">
             <form action="/memorymap/public/updateInfo" method="POST"  enctype="multipart/form-data">
             {{ csrf_field() }}
               
                 <h3>{{ $data[0]['place_name'] }}</h3>

                 <input id="id" class="hidden" value={{ $data[0]['id'] }} name="id" /><br>

                 <p class="label">コメント</p>
                 <input id="com" class="in" value={{ $data[0]['place_comment'] }} name="com" /><br>

                 <p class="label">出かけた日</p>
                 <input type="date" id="date" class="in" value={{ $data[0]['place_date'] }} name="date" /><br>

                 <p class="label">写真</p>
                 <input type="file" name="file" id="file" class="in" /><br>

                 <input type="submit" value="修正" class="btn">
             </form>

             <!-- 戻るボタンの設定 -->
             <script>
                 var url = "/memorymap/public/shosaiGamen/" + {{ $data[0]['id'] }}
                 document.write("<a href =" + url + ">戻る</a>")
             </script>

        </div>
    </div>

@endsection