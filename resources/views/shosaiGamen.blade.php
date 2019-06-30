@extends('layouts.header')

@section('css')
    <link rel="stylesheet" type="text/css" href="/memorymap/public/css/shosaiGamen.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/header.css" media="all">
@endsection

@section('content')

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap">
    </script>

    <div class="container">
        <div class="inline">

            <h3>{{ $data[0]['place_name'] }}</h3>
            
            <div id ='aaa'>
                <table>
                  <tr>
                    <td><div id="map" class="map"></div></td>
                    <td><img src="{{$path}}" class="file"></td>
                  </tr>
                </table>
            </div>
                
                <div id="info">
                <table>
                  <tr class="border">
                    <td class="table-title">出かけた日</td>
                    <td class="table-naiyo">{{ $data[0]['place_date'] }}</td>
                  </tr>
                  <tr class="border">
                    <td class="table-title">コメント</td>
                    <td class="table-naiyo">{{ $data[0]['place_comment'] }}</td>
                  </tr>
                </table>
                </div>
                
                <form action="/memorymap/public/henshuGamen" method="POST">
                {{ csrf_field() }}
                    <input type="text" value={{ $data[0]['id'] }} name="id" class="hidden" />
                    <input type="submit" value="編集" class="btn">
                </form>
                
                <form action="/memorymap/public/deleteInfo" method="POST">
                {{ csrf_field() }}
                    <input type="text" value={{ $data[0]['id'] }} name="id" class="hidden" />
                    <input type="submit" value="削除" class="deletebtn">
                </form>

        </div>
    </div>

    <script>
        var map;
        var marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: {{ $data[0]['ido'] }}, lng: {{ $data[0]['keido'] }} },
                zoom: 15
            });
                markerLatLng = { lat: {{ $data[0]['ido'] }}, lng:{{ $data[0]['keido'] }} };
                marker = new google.maps.Marker({
                position: markerLatLng,
                map: map
        });
        }

    </script>

@endsection