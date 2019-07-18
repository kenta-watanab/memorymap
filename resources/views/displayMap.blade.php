@extends('layouts.header')

@section('css')
    <link rel="stylesheet" type="text/css" href="css/displayMap.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
@endsection

@section('content')

<div id="container" class="container">

     <div id="map" class="map"> 

     <div class="hidden_box">
        <label for="label1" class="label1">クリックして表示</label>
        <input type="checkbox" id="label1"/>
            <div class="hidden_show">
                <nav>
                    <ul>
                    <li><a href="/memorymap/public/home">ＭＡＰ</a></li>
                    <li><a href="/memorymap/public/torokuGamen">登録</a></li>
                    <li><a href="/memorymap/public/ichiranGamen">一覧</a></li>
                    </ul>
                </nav>
            </div>
     </div>

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
                zoom: 15,
                mapTypeControl: false,
                fullscreenControl: true,
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

            var torokuOptions = {
        		gmap: map,
        		id: "toroku",
                label: "登録する",		
                action: function(){
        			window.location.href = "/memorymap/public/torokuGamen";
        		}  		     		        		
            }
            var toToroku = new dropDown(torokuOptions);
        
            var ichiranOptions = {
        		gmap: map,
        		id: "ichiran",
        		label: "一覧を見る",
        		action: function(){
        			window.location.href = "/memorymap/public/ichiranGamen";
        		}        		        		
            }
            var toIchiran = new dropDown(ichiranOptions);

            var ddDivOptions = {
        	    items: [toToroku, toIchiran],
        	    id: "myddOptsDiv"        		
            }
        
            var dropDownDiv = new dropDownOptionsDiv(ddDivOptions);               
                
             var dropDownOptions = {
        		gmap: map,
        		name: 'メニュー',
        		id: 'ddControl',
        		position: google.maps.ControlPosition.TOP_LEFT,
        		dropDown: dropDownDiv 
            }
        
            var dropDown1 = new dropDownControl(dropDownOptions);             
  
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

            function dropDownOptionsDiv(options){
    	        //alert(options.items[1]);
      	        var container = document.createElement('DIV');
      	        container.className = "dropDownOptionsDiv";
      	        container.id = options.id;
      	
      	        for(i=0; i<options.items.length; i++){
      		    //alert(options.items[i]);
      	        	container.appendChild(options.items[i]);
                  }      
 		        return container;        	
            }

            function dropDownControl(options){

    	        var container = document.createElement('DIV');
    	        container.className = 'container';
    	  
    	        var control = document.createElement('DIV');
    	        control.className = 'dropDownControl';
    	        control.innerHTML = options.name;
    	        control.id = options.name;
    	        var arrow = document.createElement('IMG');
    	        arrow.className = 'dropDownArrow';
    	        control.appendChild(arrow);	      		
    	        container.appendChild(control);    
                container.appendChild(options.dropDown);

    	        options.gmap.controls[options.position].push(container);
    	        google.maps.event.addDomListener(container,'click',function(){
    		        (document.getElementById('myddOptsDiv').style.display == 'block') ? document.getElementById('myddOptsDiv').style.display = 'none' : document.getElementById('myddOptsDiv').style.display = 'block';
    	        }) 	  
            } 


            function dropDown(options){
     	        //first make the outer container
     	        var container = document.createElement('DIV');
   	  	        container.className = "checkboxContainer";
                container.id = options.id;
                container.innerHTML = options.label;
   	  	   	  	
   	  	        google.maps.event.addDomListener(container,'click',function(){
   	  		    (document.getElementById(container.id).style.display == 'block') ? document.getElementById(container.id).style.display = 'none' : document.getElementById(container.id).style.display = 'block';
   	  		    options.action(); 
                })  

   	  	return container;
     }

    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jk-vadOR5ZWLZjhSrCzK_J2McxzbqNM&callback=initMap">
    </script>

@endsection