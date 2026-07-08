<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Comment;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index() {
        $posts = Post::with('user')->latest()->get();
        return view('feed', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.createPost'); 
    }

    public function store(StorePostRequest $request) {
        $request->validated();

        Post::create([
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('feed')->with('success', 'Post created successfully');
    }

    public function edit(Post $post) {
        return view('posts.updatePost', compact('post')); 
    }

    public function update(Request $request, Post $post) {
        $this->authorize('update', $post);

        $request->validate([
            'content' => 'required|string'
        ]);

        $post->update([
            'content' => $request->content
        ]);

        return redirect()->route('feed')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('feed')->with('success', 'Post deleted successfully');
    }


    public function toggleLike(Post $post)
{
    $post ->likes()->toggle(Auth::id());
    return back();
}
}