<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class RepostController extends Controller
{public function repost(Post $post)
{
    // كنقلبو واش هاد المستخدم ديجا دار repost لهاد البوست بظبط
    $existingRepost = Post::where('user_id', auth()->id())
                          ->where('original_post_id', $post->id)
                          ->first();

    if ($existingRepost) {
        // 1. يلا كان ديجا دار ليه Repost، دابا غانمسحوه (Unrepost)
        $existingRepost->delete();
        return redirect()->back()->with('success', 'Post retiré de vos partages !');
    }

    // 2. يلا مكانش داير ليه Repost، عاد نكرييوه جديد
    Post::create([
        'user_id' => auth()->id(),
        'content' => $post->content, // كيبقى نفس المحتوى
        'original_post_id' => $post->id,
    ]);

    return redirect()->back()->with('success', 'Post reposté avec succès !');
}
}