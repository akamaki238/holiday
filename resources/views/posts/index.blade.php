<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>休実-投稿一覧</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href='/css/index.css'>
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        
    </head>
    <body>
        <h1>休実</h1>
        <h1>投稿一覧</h1>
        
        <!--完了（コメント、いいね、フォロー関連の機能、プロフィール編集）-->
        <!--フォローするボタンをやったら一旦別のbranchに-->
        
        <!--お気に入り機能-->
        <!--タグをpublicとprivateで分けて管理する-->
        <!--地図の要素追加（カーソル当てると画像がでるとか）-->
        
        <!--レビュー（感想投稿）機能-->
        <!--コメントをもとにチャットルーム開設し日程調整が可能-->
        
        
        <a href='/posts/create'>投稿作成</a>
        <a href='/posts/search'>投稿検索</a>
        <a href='/posts/mypage'>マイページ</a>
        <a href="/posts/following">フォロー中の投稿一覧</a>
        
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