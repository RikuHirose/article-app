<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Follow;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'is_follow',
        'follow_id'
    ];

    public function getIsFollowAttribute()
    {
        // このユーザーはすでにログインしているユーザーにフォローされているのか
        return Follow::where('from_user_id', \Auth::user()->id)
                    ->where('to_user_id', $this->id)
                    ->exists();
    }

    public function getFollowIdAttribute()
    {
        // このユーザーはすでにログインしているユーザーにフォローされているのか
        return Follow::where('from_user_id', \Auth::user()->id)
                    ->where('to_user_id', $this->id)
                    ->first();
    }

    public function profile()
    {
        return $this->hasOne(\App\Models\Profile::class, 'user_id', 'id');
    }

    public function likedArticles()
    {
        return $this->belongsToMany(\App\Models\Article::class, 'likes', 'user_id', 'article_id');
    }

    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'user_id', 'id');
    }

    public function followingUsers()
    {
        return $this->belongsToMany(\App\Models\User::class, 'follows', 'from_user_id', 'to_user_id');
    }

    public function followerUsers()
    {
        return $this->belongsToMany(\App\Models\User::class, 'follows', 'to_user_id', 'from_user_id');
    }

    public function following()
    {
        return $this->hasMany(\App\Models\Follow::class, 'from_user_id', 'id');
    }

    public function followers()
    {
        return $this->hasMany(\App\Models\Follow::class, 'to_user_id', 'id');
    }


}
