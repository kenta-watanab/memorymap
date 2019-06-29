@extends('layouts.header')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/displayMap.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')
    
    <div id="map" class="map"></div>
    
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap"></script>

    <script>

        var map;
        
        <!--コントローラーから渡された$dataを取得 -->
        var data = @json($data);
        
        <!--マーカーを複数置くため配列で定義 -->
        var marker = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 35.681236, lng: 139.767125 },
                zoom: 12
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
            
                var pass =  "/MemoryMap/public/shosaiGamen/" + id;
            
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

@endsection