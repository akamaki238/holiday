<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>休実-検索</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel='stylesheet' href='/css/search.css'>
        
    </head>
    <body>
        <div class="container">
            <h1>休実</h1>
            <h1>場所名による検索</h1>
            
            <a href='/posts' class="button">投稿一覧</a>
            <a href='/posts/create' class="button">投稿作成</a>
            <a href='/posts/search' class="button">投稿検索</a>
            <a href='/posts/mypage' class="button">マイページ</a>
            <a href="/posts/following" class="button">フォロー中の投稿一覧</a>

            <form method="GET" action="{{ route('search') }}">
                <div class="form-group">
                    <label for="place_name">場所の名前:</label>
                    <input type="text" id="place_name" name="place_name" value="{{ request('place_name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="place_address">場所の住所:</label>
                    <input type="text" id="place_address" name="place_address" value="{{ request('place_address') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
            
            @if(isset($posts) && $posts->isNotEmpty())

                <h2>検索結果</h2>
                
                <ul>
                    @foreach($posts as $post)
                        <li>
                            <a href="/posts/{{ $post->id }}">{{ $post->id }}</a>
                            <p>タイトル: {{ $post->title }}</p>
                            <ul>
                                @foreach($post->routes as $route)
                                    <li>
                                        <p>場所の名前: {{ $route->place->name }}</p>
                                        <p>住所: {{ $route->place->address }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>検索結果がありません。</p>
            @endif
        </div>
    </body>
</html>
