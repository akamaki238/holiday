<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>休実</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>休実</h1>
    <h1>投稿詳細</h1>
    <h1 class="title">
        {{ $post->id }}
    </h1>
    <div class="content">
        <div class="content__post">
            @foreach($post->routes as $route)
                <h3 class='route_id'>
                    {{ $route->place_id }}
                    {{ $route->place->name}}
                    <br>
                    {{ $route->place->start_time}}~{{ $route->place->finish_time}}
                    <br>
                    {{ $route->place->introduction}}
                    <img src="{{ $route->place->image }}" alt="" style="max-width: 100px; height: auto;">
                </h3>
            @endforeach
        </div>
    </div>
    <div class="footer">
        <a href="/posts">戻る</a>
    </div>
    
    <div id="map" style="height:500px"></div>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{$api_key}}&libraries=marker&callback=initMap" async defer></script>
    <script>
        async function initMap() {
            const mapElement = document.getElementById("map");
            
            let routes = @json($post->routes);
            let lat = routes.map(route => route.place.latitude);
            let lng = routes.map(route => route.place.longitude);
            let color = ['#ABBC04','#BAAC04','#FABC04','#FBBA04'];
            
            const opt = {
                zoom: 13,
                center: { lat: lat[0], lng: lng[0] },
                mapId: 'b5d2e932e7327f0a' // ここに取得したマップIDを設定
            };
            
            const mapObj = new google.maps.Map(mapElement, opt);
            
            console.log(lat.length);
            console.log(lng);
            console.log(routes);
            
            const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");
            
            for (let i = 0; i < lat.length; i++) {
                let coordinate = { lat: lat[i], lng: lng[i] };
                
                let pinView = new PinElement({
                    background: color[i],
                });
                console.log(pinView.element);
                
                let marker = new AdvancedMarkerElement({
                    position: coordinate,
                    map: mapObj,
                    title: 'place' + i,
                    content: pinView.element,
                });
            }
        }
    </script>
    
    <!-- コメント表示セクション -->
    <div class="comments">
        <h2>コメント</h2>
        @foreach($post->comments->sortByDesc('created_at') as $comment)
            <div class="comment">
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </div>
        @endforeach
    </div>

    <!-- コメント投稿フォーム -->
    <div class="comment-form">
        <form action="/posts/{{ $post->id }}/comments" method="POST">
            @csrf
            <textarea name="comments" placeholder="コメントを入力してください"></textarea>
            <button type="submit">投稿する</button>
        </form>
    </div>
    
    <div class="like-section">
        <form action="{{ route('post.like', $post->id) }}" method="POST">
            @csrf
            @php
                $userLiked = $post->likes()->where('user_id', Auth::id())->exists();
            @endphp
            <button type="submit">
                @if($userLiked)
                    いいねを取り消す
                @else
                    いいね
                @endif
            </button>
        </form>
        <p>いいねの数: {{ $likeCount }}</p>
    </div>
    
    
    <div class="footer">
        <a href="/posts">戻る</a>
    </div>
    
</body>
</html>
