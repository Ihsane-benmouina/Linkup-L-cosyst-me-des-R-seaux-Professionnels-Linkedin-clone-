<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'headline'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{

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
