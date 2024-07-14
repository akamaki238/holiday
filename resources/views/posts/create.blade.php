<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link rel='stylesheet' href='/css/create.css'>
    </head>
    <body>
        <!--
        boxが上手く行っていない。（forのうちと外で試したが上手く行っていない）
        登録画面はこんな感じでひとまず大丈夫そう？
        
        グーグルマップからコピペしたコンマ区切りの緯度と経度を緯度と経度それぞれにデータベースに追加。
        またはグーグルマップで場所名で検索してそれをもとに緯度と経度の追加ができるならそれが良い。（できるだけ一つのページでやりたいことを完結させたい）
        このとき、ユーザーの情報はあると考えて良い？
        -->
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="post_introduction">
                <h2>introduction</h2>
                <input type="text" name="post[introduction]" placeholder="予定を一言で表すと？"/>
            </div>
            
            <p>
                ここからは各場所について入力してね！
            </p>
                <div class="bigbox">
                    
                
                @for ($i = 1; $i < 3; $i++)
                <h3 class="box">
                    {{$i}}つ目の予定を書こう<br>
                    <div class="smallbox">
                        
                    <div class="place_name">
                        <h2>場所の名前</h2>
                        <input type="text" name="place{{$i}}[name]" placeholder="場所の名前を書こう！"/>
                    </div>
                    
                    <div class="place_introduction">
                        <h2>紹介文</h2>
                        <input type="text" name="place{{$i}}[introduction]" placeholder="行き先の感想を書こう！"/>
                    </div>
                    
                    <div class="place_image">
                        <h2>写真</h2>
                        <input type="file" name="place{{$i}}[image]" placeholder="画像を投稿しよう！"/>
                    </div>
                    
                    <div class="place_address">
                        <h2>住所</h2>
                        <input type="text" name="place{{$i}}[address]" placeholder="行き先の住所を書こう"/>
                    </div>
                    
                    <div class="place_lat_lng">
                        <h2>緯度と経度</h2>
                        <input type="text" name="place{{$i}}[latitude]" placeholder="緯度をgooglemapからコピペしてね！"/>
                        <input type="text" name="place{{$i}}[longitude]" placeholder="経度をgooglemapからコピペしてね！"/>
                    </div>
                    
                    <div class="place_start_time">
                        <h2>何時から何時まで</h2>
                        <input type="datetime-local" name="place{{$i}}[start_time]" placeholder="何時から"/>
                        から
                        <input type="datetime-local" name="place{{$i}}[finish_time]" placeholder="何時まで"/>
                        まで
                    </div>
                    
                    </div>
                    <br>
                </h3>
                @endfor
                </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>