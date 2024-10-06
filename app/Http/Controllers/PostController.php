<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Route;
use App\Models\Place;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $api_key = config('services.Google_Map.API_key');
        return view('posts.index')->with(['posts' => $post->get(),'api_key'=> $api_key]);
    }
    
    public function show(Post $post)
    {
        $api_key = config('services.Google_Map.API_key');
        $post_js = $post;
        $post_js = $post_js ->  with('routes.place') -> get();
        
        $likeCount = $post->likes()->count();
        
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();
        
        return view('posts.show')->with([
            'post' => $post,
            'api_key'=> $api_key,
            'post_js' => $post_js,
            'comments' => $comments,
            'likeCount' => $likeCount,
            ]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function like(Post $post)
    {
        $user = Auth::user();
    
        // 既に「いいね」しているかを確認
        $existing_like = Like::where('post_id', $post->id)->where('user_id', $user->id)->first();
    
        if (!$existing_like) {
            // いいねを作成
            $like = new Like();
            $like->post_id = $post->id;
            $like->user_id = $user->id;
            $like->save();
        } else {
            // いいねを削除（取り消し）
            $existing_like->delete();
        }
    
        return redirect()->back();
    }
    
    public function store(Request $request, Post $post, Place $place, Route $route)
    {
        $post_introduction = $request['post']['introduction'];
    
        // Postデータの保存
        $post->introduction = $post_introduction;
        $post->user_id = Auth::id(); // ユーザーIDを設定
        $post->save();
    
        $place_ids = [];
    
        for ($i = 1; $i < 7; $i++) {
            // 各場所のデータが入力されているかをチェック
            $input_place = $request["place{$i}"];
    
            // 場所名が入力されていない場合はスキップ
            if (empty($input_place['name']) || empty($input_place['image'])) {
                continue;
            }
    
            $place = new Place();
    
            // 画像のアップロード処理
            $image_url = Cloudinary::upload($input_place["image"]->getRealPath())->getSecurePath();
            $input_place['image'] = $image_url;
    
            // Placeデータの保存
            $place->fill($input_place)->save();
            $place_ids[] = $place->id;
        }
    
        // 保存された場所データがある場合のみ、Routeデータを作成
        foreach ($place_ids as $place_id) {
            $route = new Route();
            $route->post_id = $post->id;
            $route->place_id = $place_id;
            $route->save();
        }
    
        return redirect('/posts/' . $post->id);
    }
    
    public function followingPosts()
    {
        $user = auth()->user();
    
        // フォローしているユーザーのIDを取得
        $followingUserIds = $user->following->pluck('id');
    
        // フォローしているユーザーの投稿を取得
        $posts = Post::whereIn('user_id', $followingUserIds)->with('routes.place')->get();
    
        return view('posts.following', compact('posts'));
    }
    
    public function search(Request $request)
    {
        $query = Post::query();

        // プレイスの条件で検索
        if ($request->has('place_name') && $request->input('place_name') !== '') {
            $query->whereHas('places', function($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('place_name') . '%');
            });
        }

        if ($request->has('place_address') && $request->input('place_address') !== '') {
            $query->whereHas('places', function($query) use ($request) {
                $query->where('address', 'like', '%' . $request->input('place_address') . '%');
            });
        }

        // その他の条件があれば追加

        $posts = $query->get();

        return view('posts.search', compact('posts'));
    }
    
    public function mypage()
    {
        // 現在のログインユーザーを取得
        $user = auth()->user();
        
        // ユーザーの投稿を取得
        $posts = $user->posts()->with('routes.place')->get();
        
        // ビューに投稿データを渡す
        return view('posts.mypage', compact('posts'));
    }
    
    // コメントの保存処理を追加
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'comments' => 'required|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id(); // 現在ログインしているユーザーのIDを取得
        $comment->post_id = $postId;
        $comment->comment = $request->input('comments');
        $comment->save();

        return redirect()->route('show', ['post' => $postId]);
    }
    
}
?>