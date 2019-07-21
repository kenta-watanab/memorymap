@extends('layouts.header')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/displayMap.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

<div id="container" class="container">

     <div id="map" class="map"> 

</div></div>
    
    <script>
    
        var map;
        
        <!--コントローラーから渡された$dataを取得 -->
        var data = @json($data);
        
        <!--マーカーを複数置くため配列で定義 -->
        var marker = [];

        function initMap() {

            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 35.681236, lng: 139.767125 },
                zoom: 10,
                mapTypeControl: false,
            });
            
            <!--取得したデータのレコード数分処理を繰り返す -->
            for (var i = 0; i < data.length; i++) {

              <!--マーカーを置く緯度・経度にDBの値をセットする-->
                    markerLatLng = { lat: data[i]['ido'], lng: data[i]['keido'] };
                    marker[i] = new google.maps.Marker({
                    position: markerLatLng,
                    map: map
                });
              
              <!--情報ウインドウを設定するメソッドを呼出す -->
                    attachMessage(marker[i], data[i]['place_name'], data[i]['place_comment'], data[i]['place_date'], data[i]['id']);
            }

            var menu = document.createElement('DIV');
                menu.className = 'menu'

            var dropDownMenuUl = document.createElement('ul');
                dropDownMenuUl.className = 'dropmenu'
                dropDownMenuUl.id = 'dropmenu';

            var dropDownMenuLi = document.createElement('li');
                dropDownMenuLi.innerHTML = 'メニュー';
                dropDownMenuLi.className = 'dropmenu_li'
                
            var dropDownListUl = document.createElement('ul');
                dropDownListUl.className = 'droplist_ul'

            var dropDownListLi = document.createElement('li');
                dropDownListLi.className = 'droplist_li'
                var linkUrl = '/memorymap/public/torokuGamen';
                dropDownListLi.innerHTML = '<a href="' + linkUrl + '">' + '登録をする' + '</a>';
            
            var dropDownListLi2 = document.createElement('li');
                dropDownListLi2.className = 'droplist_li'
                var linkUrl = '/memorymap/public/ichiranGamen';
                dropDownListLi2.innerHTML = '<a href="' + linkUrl + '">' + '一覧を見る' + '</a>';

            dropDownListUl.appendChild(dropDownListLi);
            dropDownListUl.appendChild(dropDownListLi2);
            dropDownMenuLi.appendChild(dropDownListUl);
            dropDownMenuUl.appendChild(dropDownMenuLi);
            menu.appendChild(dropDownMenuUl);
           
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(menu);
  
        };
        
        /*
        * 情報ウインドウを設定する
        @param marker 座標
        @param name 名前
        @param com コメント
        @param place_date 日付
        *
        */
            function attachMessage(marker, name, com, place_date, id) {
            
                var pass =  "/memorymap/public/shosaiGamen/" + id;
            
                <!-- htmlタグの設定 -->
                var contentStr = "<div id='window'><div class='name'><a href=" + pass + ">" + name +
                    "</a></div><br><div class='date'>" + place_date + "</div><br><div class='com'>" + com + "</div></div>";

                <!-- 情報ウインドウの設定 -->
                google.maps.event.addListener(marker, 'click', function (event) {
                    new google.maps.InfoWindow({
                        content: contentStr
                    }).open(marker.getMap(), marker);
                });
            }

    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap">
    </script>

@endsection