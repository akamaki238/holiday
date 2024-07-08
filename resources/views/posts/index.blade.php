<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Holiday</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href='/css/index.css'>
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        
    </head>
    <body>
        <h1>Post list</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->id }}</a>
                </h2>
                <div class='post'>
                    <h2 class='id'>{{ $post->id }}</h2>
                    <div class='box'>
                        @foreach($post->routes as $route)
                            <h3 class='route_id'>
                                {{ $route->place_id }}
                                {{ $route->place->name}}
                            </h3>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        
        
        
        <div id="map" style="height:500px"></div>
        // マップの表示部分
        <script>
            function initMap() {
                map = document.getElementById("map");
                
                // 東京タワーの緯度、経度を変数に入れる
                let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
                let tokyoTower1= {lat: 35.6585776, lng: 139.7454541};

                // オプションの設定
                opt = {
                    // 地図の縮尺を指定
                    zoom: 13,

                    // センターを東京タワーに指定
                    center: tokyoTower,
                };

                // 地図のインスタンスを作成（第一引数にはマップを描画する領域、第二引数にはオプションを指定）
                mapObj = new google.maps.Map(map, opt);
                
                marker = new google.maps.Marker({
                    // ピンを差す位置を東京タワーに設定
                    position: tokyoTower,

                    // ピンを差すマップを指定
                    map: mapObj,

                    // ホバーしたときに「tokyotower」と表示されるように指定

                    title: 'tokyotower',
                });
                marker1 = new google.maps.Marker({
                    // ピンを差す位置を東京タワーに設定
                    position: tokyoTower1,

                    // ピンを差すマップを指定
                    map: mapObj,

                    // ホバーしたときに「tokyotower」と表示されるように指定

                    title: 'tokyotower1',
                });
            }
        </script>

        // Google Maps APIの読み込み（keyには自分のAPI_KEYを指定）
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{$api_key}}&callback=initMap" async defer></script>
        
    </body>
</html>