function initMap() {

    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 36.154394, lng: 137.921820 },
        zoom: 7,
        mapTypeControl: false,
    });

    // 取得したデータのレコード数分処理を繰り返す
    for (var i = 0; i < data.length; i++){

        // マーカーを置く緯度・経度にDBの値をセットする
        markerLatLng = { lat: data[i]['ido'], lng: data[i]['keido'] };
        marker[i] = new google.maps.Marker({
            position: markerLatLng,
            map: map
        });

        // 情報ウインドウを設定するメソッドを呼出す
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

    var pass = "/memorymap/public/shosaiGamen/" + id;

    // htmlタグの設定
    var contentStr = "<div id='window'><div class='name'><a href=" + pass + ">" + name +
        "</a></div><br><div class='date'>" + place_date + "</div><br><div class='com'>" + com + "</div></div>";

    // 情報ウインドウの設定
    google.maps.event.addListener(marker, 'click', function (event) {
        new google.maps.InfoWindow({
            content: contentStr
        }).open(marker.getMap(), marker);
    });
}