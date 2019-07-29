@extends('layouts.header')

@section('css')
<link rel="stylesheet" type="text/css" href="css/ichiranGamen.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

<div class="container">
  <div class="inline">

    <table>

      <tbody>

        <script>
          <!--コントローラーから渡された$dataを取得 -->
          var data = @json($data);
          var images = @json($images);
          for (var i = 0; i < data.length; i++) 
          { var pass="toShosaiGamen(" + data[i]['id'] + ")" ; var tag="<tr class='border' onclick=" + pass + ">" document.write(tag); document.write("<td class='hidden'>");
          document.write(data[i]['id']);
          document.write("</td>");

          document.write("<td>");
            document.write(data[i]['place_date']);
            document.write("</td>");

          document.write("<td>");
            document.write(data[i]['place_name']);
            document.write("</td>");

          document.write("<td>");
            document.write("<img src=");
                 document.write(images[i]);
                 document.write(" class='file'>");
            document.write("</td>");

          document.write("</tr>")
          }

          function toShosaiGamen(id) {
          location.href = "/memorymap/public/shosaiGamen/" + id ;
          }

        </script>

      </tbody>

    </table>

  </div>
</div>

@endsection