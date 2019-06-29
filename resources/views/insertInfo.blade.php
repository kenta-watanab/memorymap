<!DOCTYPE HTML>
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <TITLE>思い出ＭＡＰ</TITLE>
    <link rel="stylesheet" type="text/css" href="css/insertInfo.css" media="all">
</HEAD>

<BODY>

    <header>
        <p class="head_title">思い出<span>ＭＡＰ</span></p>
        <nav>
            <ul>
                <li><a href="/MemoryMap/public/displayMap">ＭＡＰ</a></li>
                <li><a href="/MemoryMap/public/insertInfo">登録</a></li>
                <li><a href="">一覧</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="inline">

            <h3>登録して下さい</h3>
            <form>
                <p class="label">出かけた場所</p>
                <input placeholder="例）東京スカイツリー" id="name" class="in" /><br>

                <input type="button" onClick="attrLatLngFromAddress()" value="検索する" class="btn2">

                <div id="map" class="map"></div>

                <p class="label">緯度</p>
                <input placeholder="緯度" id="ido" class="in" /><br>

                <p class="label">経度</p>
                <input placeholder="経度" id="keido" class="in" /><br>

                <p class="label">コメント</p>
                <input placeholder="コメントを記入して下さい" id="com" class="in" /><br>

                <p class="label">出かけた日</p>
                <input type="date" id="date" class="in" /><br>

                <p class="label">写真</p>
                <input type="file" name="file" id="file" class="in" /><br>

                <input type="submit" value="送信" class="btn">

            </form>

        </div>
    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap"></script>

    <script>
        var map;
        var marker = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 35.658593, lng: 139.745441 },
                zoom: 15
            });
        }

        function attrLatLngFromAddress() {
            var address = document.getElementById("name").value;
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var lat = results[0].geometry.location.lat();
                    var lng = results[0].geometry.location.lng();
                    // 取得した緯度・経度を画面の項目にセット
                    document.getElementById("ido").value = (lat);
                    document.getElementById("keido").value = (lng); 
                    //マーカーを配置
                    markerLatLng = { lat: lat, lng: lng };
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

</BODY>

</HTML>