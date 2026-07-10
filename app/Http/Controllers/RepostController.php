<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class RepostController extends Controller
{
    //
    public function store(Post $post)
    {
        $originalPostId = $post->original_post_id ?? $post->id;

        Post::create([
            'user_id' => Auth::id(),
            'content' => $post->content, 
            'original_post_id' => $originalPostId,
        ]);

        return back()->with('success', 'Post partagé avec succès sur votre profil !');
    }
}
