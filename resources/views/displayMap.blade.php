@extends('layouts.header')

@section('css')
    <script type="text/javascript" src="js/displayMap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/displayMap.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

<div id="container" class="map-container">
     <div id="map" class="map"></div>
</div>
    
<script>
    
    var map;
        
    <!--コントローラーから渡された$dataを取得 -->
    var data = @json($data);
        
    <!--マーカーを複数置くため配列で定義 -->
    var marker = [];

</script>
    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap">
</script>

@endsection