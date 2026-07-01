<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use AuthorizesRequests;
    public function index(){
        $posts = Post::with('user')->latest()->get();
        return view('feed',['posts'=>$posts]);
    }
    public function store(StorePostRequest $resquest){
        $resquest->validated();

        User::create([
            'content'=>$resquest->content,
            'user_id'=>Auth::id()
        ]);
        return redirect()->route('feed');
    }
     public function updatePost(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update([
            'content' => $request->content
        ]);
        return redirect()->route('feed')->with('success','post updeted seccessfully');
    }
    //
}
