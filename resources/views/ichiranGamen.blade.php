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
            
            var tag="<ul class ='list' onclick=" + pass + ">" 
            document.write(tag);

            document.write("<div class='name'>");           
                document.write(data[i]['place_name']);
            document.write("</div>");

              document.write("<li class='image_erea'>");  
                document.write("<img src=");
                document.write(images[i]);
                document.write(" class='file'>");
              document.write("</li>");
            
              document.write("<li class='data_erea'>");
                document.write(data[i]['place_date']);
              document.write("</li>");

            document.write("</ul>");
            
          }

          function toShosaiGamen(id) {
          location.href = "shosaiGamen/" + id ;
          }

        </script>
<p class="foot">©MemryMap</p>
</div>

@endsection