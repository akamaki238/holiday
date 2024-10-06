<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>休実-マイページ</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel='stylesheet' href='/css/index.css'>
    </head>
    <body>
        <h1>休実</h1>
        <h1>マイページ</h1>
        <a href='/posts/create'>投稿作成</a>
        <a href="{{ route('profile.edit') }}">プロフィール編集</a>
        あなたの投稿
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