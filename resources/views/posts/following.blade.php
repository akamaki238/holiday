<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>フォロー中の投稿</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel='stylesheet' href='/css/following.css'>
</head>
<body>
    <h1>フォロー中の投稿</h1>
    
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
