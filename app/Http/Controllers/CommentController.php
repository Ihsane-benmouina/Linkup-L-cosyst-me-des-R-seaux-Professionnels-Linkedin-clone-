<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        return back()->with('success', 'Commentaire ajouté !');
    }
}
