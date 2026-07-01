<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    use AuthorizesRequests;
    public function index(){
        $posts = Post::with('user')->latest()->get();
        return view('feed',['posts'=>$posts]);
    }
    public function store(StorePostRequest $resquest){
        $resquest->validated();

        Post::create([
            'content'=>$resquest->content,
            'user_id'=>Auth::id()
        ]);
        return redirect()->route('feed');
    }
    public function formPost(){
        return view('posts.createPost');
    }
    public function pageUpdate(Post $post){
        return View('post.updatepoast', compact('post'));

    }
     public function updatePost(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update([
            'content' => $request->content
        ]);
        return redirect()->route('feed')->with('success','post updeted seccessfully');
    }
    public function deletePost(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('feed')->with('success','post deleted seccessfully');

    }
    //
}
