<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Route;
use App\Models\Place;
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
        //dd($post);
        return view('posts.show')->with(['post' => $post,'api_key'=> $api_key,'post_js' => $post_js]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request, Post $post , Place $place, Route $route)
    {
        $post_introduction = $request['post']['introduction'];
        
        $post -> introduction = $post_introduction;
        $post -> user_id = 1;//Auth::id()にする
        $post -> save();
        //dd($post);
        
        $place_id=[];
        for($i = 1 ; $i < 3 ; $i++){
            $place = new Place();
            $input_place = $request["place{$i}"];
            $image_url = Cloudinary::upload($input_place["image"]->getRealPath())->getSecurePath();
            dd($image_url);
            $input_place['image'] = $image_url;
            $place -> fill($input_place) -> save();
            $place_id[] = $place -> id;
            //dd($place_id);
        }
        
        foreach($place_id as $tmp){
            $route = new Route();
            $route -> post_id = $post -> id;
            $route -> place_id = $tmp;
            $route -> save();
        }
        
        return redirect('/posts/' . $post->id);
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
}
?>