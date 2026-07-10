<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'headline',
        'company',
        'image_url',
        'is_open_to_work',
        'email',
        'password',
    ];
public function posts()
{
    return $this->hasMany(Post::class);
}
public function comments() {
    return $this->hasMany(Comment::class);
}

public function likes() {
    return $this->belongsToMany(Post::class, 'likes');
}


public function followings() 
{
    return $this->belongsToMany(User::class, 'follows', 'follower_id', 'user_id');
}

public function followers()
{
    return $this->belongsToMany(User::class, 'follows', 'user_id', 'follower_id');
}

public function isFollowing(User $user)
{
    return $this->followings()->where('user_id', $user->id)->exists();
}

public function savedPosts()
{
    return $this->belongsToMany(Post::class, 'saved_posts', 'user_id', 'post_id')->withTimestamps();
}

public function hasSaved(Post $post)
{
    return $this->savedPosts()->where('post_id', $post->id)->exists();
}
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
