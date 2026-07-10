<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SavedPostController extends Controller
{
    //
    public function index()
    {
        $posts = auth()->user()->savedPosts()->with(['user', 'likes', 'comments'])->latest()->get();
        return view('saved.index', compact('posts'));
    }

    public function toggleSave(Post $post)
    {
        $user = auth()->user();
        
        if ($user->hasSaved($post)) {
            $user->savedPosts()->detach($post->id);
            return back()->with('success', 'Post retiré de vos signets.');
        }

        $user->savedPosts()->attach($post->id);
        return back()->with('success', 'Post enregistré dans vos signets.');
    }
}
