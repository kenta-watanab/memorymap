@extends('layouts.header')

@section('css')
<link rel="stylesheet" type="text/css" href="/memorymap/public/css/shosaiGamen.css" media="all">
<link rel="stylesheet" type="text/css" href="../css/header.css" media="all">
@endsection

@section('content')

<div class="b_container">

    <h3>{{ $data[0]['place_name'] }}</h3>

    <div id="map" class="map">
    </div>
    <div>
        <img src="{{$path}}" class="file">
    </div>

    <div id="info">

        <div class="title">出かけた日</div>
        <div class="naiyo">{{ $data[0]['place_date'] }}</div>

        <div class="title">コメント</div>
        <div class="naiyo">{{ $data[0]['place_comment'] }}</div>

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

<script>
    var map;
    var marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: {
                    {
                        $data[0]['ido']
                    }
                },
                lng: {
                    {
                        $data[0]['keido']
                    }
                }
            },
            zoom: 15
        });
        markerLatLng = {
            lat: {
                {
                    $data[0]['ido']
                }
            },
            lng: {
                {
                    $data[0]['keido']
                }
            }
        };
        marker = new google.maps.Marker({
            position: markerLatLng,
            map: map
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap">
</script>

@endsection