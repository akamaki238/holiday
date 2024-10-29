<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>休実-検索</title>
    </head>
    <body>
        <div class="container">
            <h1>休実</h1>
            <h1>場所名による検索</h1>

            <form method="GET" action="{{ route('search') }}">
                <div class="form-group">
                    <label for="place_name">Place Name:</label>
                    <input type="text" id="place_name" name="place_name" value="{{ request('place_name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="place_address">Place Address:</label>
                    <input type="text" id="place_address" name="place_address" value="{{ request('place_address') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
    
            @if(isset($posts) && $posts->isNotEmpty())

                <h2>検索結果</h2>

                <ul>
                    @foreach($posts as $post)
                        <li>
                            <h3>Post ID: {{ $post->id }}</h3>
                            <p>Post Title: {{ $post->title }}</p>
                            <ul>
                                @foreach($post->routes as $route)
                                    <li>
                                        <p>Place Name: {{ $route->place->name }}</p>
                                        <p>Address: {{ $route->place->address }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No posts found.</p>
            @endif
        </div>
    </body>
</html>
