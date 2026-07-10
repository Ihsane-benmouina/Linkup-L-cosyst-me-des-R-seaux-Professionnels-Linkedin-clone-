<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    use HasFactory;
    protected $fillable = ['content', 'user_id']; 

public function user()
{
    return $this->belongsTo(User::class);
}
public function comments() {
    return $this->hasMany(Comment::class)->latest();
}

public function likes() {
    return $this->belongsToMany(User::class, 'likes')->withTimestamps();
}

public function originalPost()
{
    return $this->belongsTo(Post::class, 'original_post_id');
}

public function reposts()
{
    return $this->hasMany(Post::class, 'original_post_id');
}
public function savedByUsers()
{
    return $this->belongsToMany(User::class, 'saved_posts', 'post_id', 'user_id')->withTimestamps();
}
    
}
