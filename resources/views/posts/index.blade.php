<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>休実-投稿一覧</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href='/css/index.css'>
        
    </head>
    <body>
        <h1>休実</h1>
        <h1>投稿一覧</h1>
        
        <!--お気に入り機能-->
        <!--タグをpublicとprivateで分けて管理する-->
        <!--地図の要素追加（カーソル当てると画像がでるとか）-->
        
        <!--レビュー（感想投稿）機能-->
        <a href='/posts' class="button">投稿一覧</a>
        <a href='/posts/create' class="button">投稿作成</a>
        <a href='/posts/search' class="button">投稿検索</a>
        <a href='/posts/mypage' class="button">マイページ</a>
        <a href="/posts/following" class="button">フォロー中の投稿一覧</a>
        
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{ $post->id }}">{{ $post->id }}</a>
                    <div class='box'>
                        @foreach($post->routes as $route)
                            <h3 class='route_id'>
                                <img src="{{ $route->place->image }}" alt="" style="max-width: 100px; height: auto;">
                                {{ $route->place_id }}
                                {{ $route->place->name}}
                            </h3>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>