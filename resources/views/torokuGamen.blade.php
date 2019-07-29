@extends('layouts.header')

@section('css')
<link rel="stylesheet" type="text/css" href="css/insertInfo.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

<div class="b_container">

    @if (count($errors) > 0)
    <div>

        @foreach ($errors->all() as $error)
        <p class="error_message">{{ $error }}</p>
        @endforeach

    </div>
    @endif

    @if (Session::has('message'))
    <script>
        window.onload = function() {
            alert("登録されました");
        };
    </script>
    @endif

    <form action="/memorymap/public/insertInfo" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p class="label">出かけた場所</p>
        <input placeholder="例）東京スカイツリー" name="name" id="name" class="in" /><br>

        <input type="button" onClick="attrLatLngFromAddress()" value="&#xf689; 検索" class="btn fas">

        <div id="map" class="map"></div>

        <p class="label">緯度</p>
        <input placeholder="緯度" name="ido" id="ido" class="in" /><br>

        <p class="label">経度</p>
        <input placeholder="経度" name="keido" id="keido" class="in" /><br>

        <p class="label">コメント</p>
        <input placeholder="コメントを記入して下さい" name="com" class="in" /><br>

        <p class="label">出かけた日</p>
        <input type="date" name="date" class="in" /><br>

        <p class="label">写真</p>
        <input type="file" name="file" class="in" /><br>

        <input type="submit" value="&#xf152; 送信" class="btn marginbottom far">

    </form>

</div>

<script>
    var map;
    var marker = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 35.658593,
                lng: 139.745441
            },
            zoom: 15
        });
    }

    function attrLatLngFromAddress() {
        var address = document.getElementById("name").value;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
                // 小数点第六位以下を四捨五入した値を緯度経度にセット、小数点以下の値が第六位に満たない場合は0埋め
                document.getElementById("ido").value = (Math.round(lat * 1000000) / 1000000).toFixed(6);
                document.getElementById("keido").value = (Math.round(lng * 1000000) / 1000000).toFixed(6);
                //マーカーを配置
                markerLatLng = {
                    lat: lat,
                    lng: lng
                };
                marker = new google.maps.Marker({
                    position: markerLatLng,
                    map: map
                })
                //検索した場所に移動
                map.panTo(new google.maps.LatLng(lat, lng));

            } else {
                alert("検索に失敗しました");
            }
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap">
</script>

@endsection