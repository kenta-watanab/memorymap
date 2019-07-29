@extends('layouts.header')

@section('css')
<link rel="stylesheet" type="text/css" href="css/ichiranGamen.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

<div class="b_container">

  @if (count($data) < 0)
    <div>
        <p>登録されていません</p>
    </div>
    @endif

        <script>
          <!--コントローラーから渡された$dataを取得 -->
          var data = @json($data);
          var images = @json($images);

          for (var i = 0; i < data.length; i++) { 
            
            var pass="toShosaiGamen(" + data[i]['id'] + ")" ; 
            
            var tag="<div class ='list' onclick=" + pass + ">" 
            document.write(tag);
              
              document.write("<img src=");
              document.write(images[i]);
              document.write(" class='file'>");
           
              document.write(data[i]['place_date']);           
              document.write(data[i]['place_name']);

            document.write("</div>");
            
          }

          function toShosaiGamen(id) {
          location.href = "/memorymap/public/shosaiGamen/" + id ;
          }

        </script>
</div>

@endsection